// ตัวรันโค้ด TypeScript ในหน้าบทเรียน ใช้กับกล่องโค้ดที่มีแอตทริบิวต์ data-run-ts
// - "▶ ตรวจ Type แล้วรัน" ตรวจชนิดข้อมูลด้วย TypeScript จริงก่อน ถ้ามี Error จะไม่รัน (คล้าย tsc)
// - "⚡ รันแบบ tsx" ตัด Type ทิ้งแล้วรันทันทีโดยไม่ตรวจ (คล้าย tsx และ node)
(function () {
  const windows = Array.from(document.querySelectorAll(".code-window[data-run-ts]"));
  if (windows.length === 0) return;

  // TypeScript 7 ไม่มี JavaScript API แล้ว จึงใช้ 6.0.3 (เวอร์ชันสุดท้ายที่ทำงานในเบราว์เซอร์ได้ กฎการตรวจ Type เหมือนกัน)
  const TS_URL = "https://cdn.jsdelivr.net/npm/typescript@6.0.3/lib/typescript.js";
  const TS_INTEGRITY = "sha384-hLq9xq2/tlk0vqCTYY2KECZxYi9UuHw/GLg6biud4KQQhLlq4x/OouQB+CusnUN3";
  const LIB_URL = new URL("../vendor/typescript-6.0.3-lib-es2020.json", document.currentScript.src).href;

  const GLOBALS =
    "interface Console { log(...data: any[]): void; info(...data: any[]): void; warn(...data: any[]): void; error(...data: any[]): void; table(data?: any): void; }\n" +
    "declare var console: Console;\n" +
    "declare function setTimeout(handler: (...args: any[]) => void, timeout?: number, ...args: any[]): number;\n" +
    "declare function clearTimeout(id: number | undefined): void;\n";

  const style = document.createElement("style");
  style.textContent = `
.run-actions { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; justify-content: flex-end; }
.run-btn, .run-fast-btn { color: #fff; border: 0; border-radius: 6px; padding: 5px 12px; font-size: 0.8rem; font-weight: 700; cursor: pointer; font-family: inherit; }
.run-btn { background: #2563eb; }
.run-btn:hover { background: #1d4ed8; }
.run-fast-btn { background: #7c3aed; }
.run-fast-btn:hover { background: #6d28d9; }
.run-btn:disabled, .run-fast-btn:disabled { opacity: 0.6; cursor: wait; }
.reset-btn { background: transparent; color: #a3a3a3; border: 1px solid #404040; border-radius: 6px; padding: 4px 10px; font-size: 0.75rem; cursor: pointer; font-family: inherit; }
.reset-btn:hover { color: #fff; border-color: #737373; }
.code-window[data-run-ts] pre[contenteditable]:focus { outline: 2px solid #3b82f6; outline-offset: -2px; }
.run-output { background: #0b1120; border-top: 2px solid #2563eb; padding: 12px 16px; font-family: Consolas, "Courier New", monospace; font-size: 0.85rem; color: #e2e8f0; white-space: pre-wrap; word-break: break-word; }
.run-output .run-title { display: block; font-family: Sarabun, sans-serif; font-size: 0.75rem; font-weight: 700; margin-bottom: 6px; color: #93c5fd; }
.run-line::before { content: "› "; color: #64748b; }
.run-line.err { color: #fca5a5; }
.run-line.warn { color: #fde68a; }
.run-line.ok { color: #86efac; }
.run-line.muted { color: #94a3b8; font-style: italic; }
.run-line.type-err { color: #fca5a5; }
.run-line.type-err::before { content: "✖ "; color: #f87171; }
`;
  document.head.appendChild(style);

  let loading = null;
  const libCache = {};

  function loadTypeScript() {
    if (loading) return loading;
    loading = Promise.all([
      new Promise((resolve, reject) => {
        if (window.ts) return resolve();
        const script = document.createElement("script");
        script.src = TS_URL;
        script.integrity = TS_INTEGRITY;
        script.crossOrigin = "anonymous";
        script.onload = resolve;
        script.onerror = () => reject(new Error("โหลดตัวตรวจ TypeScript ไม่สำเร็จ (ตรวจการเชื่อมต่ออินเทอร์เน็ต)"));
        document.head.appendChild(script);
      }),
      fetch(LIB_URL).then((res) => {
        if (!res.ok) throw new Error("โหลดไฟล์นิยาม Type มาตรฐาน (lib) ไม่สำเร็จ");
        return res.json();
      }),
    ]).then(([, lib]) => lib.files);
    loading.catch(() => (loading = null));
    return loading;
  }

  function check(ts, libFiles, code) {
    const FILE = "lesson.ts";
    const options = {
      target: ts.ScriptTarget.ES2020,
      module: ts.ModuleKind.ESNext,
      moduleDetection: ts.ModuleDetectionKind.Force,
      strict: true,
      noEmit: true,
      lib: ["lib.es2020.d.ts"],
      types: [],
    };
    const textOf = (name) => {
      if (name === FILE) return code;
      if (name === "globals.d.ts") return GLOBALS;
      return libFiles[name.split("/").pop()];
    };
    const host = {
      getSourceFile: (name, languageVersion) => {
        const base = name.split("/").pop();
        if (libFiles[base]) {
          if (!libCache[base]) libCache[base] = ts.createSourceFile(base, libFiles[base], languageVersion);
          return libCache[base];
        }
        const text = textOf(name);
        return text === undefined ? undefined : ts.createSourceFile(name, text, languageVersion);
      },
      getDefaultLibFileName: () => "lib.es2020.d.ts",
      getDefaultLibLocation: () => "/",
      writeFile: () => {},
      getCurrentDirectory: () => "/",
      getDirectories: () => [],
      fileExists: (name) => textOf(name) !== undefined,
      readFile: (name) => textOf(name),
      getCanonicalFileName: (name) => name,
      useCaseSensitiveFileNames: () => true,
      getNewLine: () => "\n",
    };
    const program = ts.createProgram([FILE, "globals.d.ts"], options, host);
    return ts.getPreEmitDiagnostics(program).map((d) => ({
      line: d.file && d.start !== undefined ? d.file.getLineAndCharacterOfPosition(d.start).line + 1 : null,
      code: d.code,
      message: ts.flattenDiagnosticMessageText(d.messageText, " "),
    }));
  }

  function transpile(ts, code) {
    return ts
      .transpileModule(code, {
        compilerOptions: { target: ts.ScriptTarget.ES2020, module: ts.ModuleKind.ESNext, moduleDetection: ts.ModuleDetectionKind.Force },
      })
      .outputText.replace(/^export \{\};?\s*$/m, "");
  }

  function format(value) {
    if (typeof value === "string") return value;
    if (value === undefined) return "undefined";
    if (value instanceof Error) return value.name + ": " + value.message;
    if (typeof value === "function") return "ƒ " + (value.name || "anonymous") + "()";
    try {
      return JSON.stringify(value);
    } catch (e) {
      return String(value);
    }
  }

  const AsyncFunction = Object.getPrototypeOf(async function () {}).constructor;

  windows.forEach((win) => {
    const pre = win.querySelector("pre");
    const header = win.querySelector(".code-header");
    const copyBtn = header.querySelector(".copy-icon-btn");
    const original = pre.textContent;
    pre.setAttribute("contenteditable", "true");
    pre.setAttribute("spellcheck", "false");

    const actions = document.createElement("div");
    actions.className = "run-actions";
    const resetBtn = document.createElement("button");
    resetBtn.type = "button";
    resetBtn.className = "reset-btn";
    resetBtn.textContent = "↺ คืนค่าเดิม";
    const fastBtn = document.createElement("button");
    fastBtn.type = "button";
    fastBtn.className = "run-fast-btn";
    fastBtn.textContent = "⚡ รันแบบ tsx";
    fastBtn.title = "ตัด Type ทิ้งแล้วรันทันที ไม่ตรวจ Type (เหมือน tsx และ node)";
    const runBtn = document.createElement("button");
    runBtn.type = "button";
    runBtn.className = "run-btn";
    runBtn.textContent = "▶ ตรวจ Type แล้วรัน";
    runBtn.title = "ตรวจ Type ก่อน ถ้ามี Error จะไม่รัน (เหมือน tsc)";
    header.appendChild(actions);
    actions.append(resetBtn, fastBtn, runBtn);
    if (copyBtn) actions.appendChild(copyBtn);

    const output = document.createElement("div");
    output.className = "run-output";
    output.hidden = true;
    win.appendChild(output);

    function write(kind, text) {
      const line = document.createElement("div");
      line.className = "run-line " + kind;
      line.textContent = text;
      output.appendChild(line);
    }

    function title(text) {
      const el = document.createElement("span");
      el.className = "run-title";
      el.textContent = text;
      output.appendChild(el);
    }

    const fakeConsole = {
      log: (...args) => write("log", args.map(format).join(" ")),
      info: (...args) => write("log", args.map(format).join(" ")),
      warn: (...args) => write("warn", args.map(format).join(" ")),
      error: (...args) => write("err", args.map(format).join(" ")),
      table: (data) => write("log", format(data)),
    };

    async function run(withTypeCheck) {
      output.hidden = false;
      output.textContent = "";
      runBtn.disabled = fastBtn.disabled = true;
      const code = pre.innerText;
      try {
        if (!window.ts) write("muted", "⏳ กำลังโหลดตัวตรวจ TypeScript (ครั้งแรกเท่านั้น ประมาณ 2 MB)...");
        const libFiles = await loadTypeScript();
        output.textContent = "";
        const ts = window.ts;

        if (withTypeCheck) {
          const errors = check(ts, libFiles, code);
          if (errors.length > 0) {
            title("ผลการตรวจ Type (TypeScript " + ts.version + ")");
            errors.forEach((e) => write("type-err", (e.line ? "บรรทัด " + e.line + ": " : "") + e.message + " (TS" + e.code + ")"));
            write("muted", "พบ Type Error " + errors.length + " จุด — โค้ดยังไม่ถูกรัน แก้ให้ถูกแล้วลองใหม่ หรือกด ⚡ รันแบบ tsx เพื่อดูว่าถ้าไม่ตรวจจะเกิดอะไรขึ้น");
            return;
          }
          title("✔ ไม่พบ Type Error — ผลลัพธ์ (Console)");
        } else {
          title("⚡ รันแบบ tsx: ตัด Type ทิ้งแล้วรันทันที (ไม่ตรวจ Type) — ผลลัพธ์ (Console)");
        }

        await new AsyncFunction("console", transpile(ts, code))(fakeConsole);
        if (output.querySelectorAll(".run-line").length === 0) write("muted", "(โค้ดทำงานแล้ว แต่ไม่มีคำสั่ง console.log)");
      } catch (error) {
        write("err", "❌ " + error.name + ": " + error.message);
      } finally {
        runBtn.disabled = fastBtn.disabled = false;
      }
    }

    runBtn.addEventListener("click", () => run(true));
    fastBtn.addEventListener("click", () => run(false));
    resetBtn.addEventListener("click", () => {
      pre.textContent = original;
      output.hidden = true;
      output.textContent = "";
    });
  });
})();
