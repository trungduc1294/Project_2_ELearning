import { basicSetup } from "codemirror";
import { python } from "@codemirror/lang-python";
import { EditorView, keymap } from "@codemirror/view";
import { indentWithTab } from "@codemirror/commands";
import { EditorState } from "@codemirror/state";

let myTheme = EditorView.theme({
  "&": {
    color: "white",
    backgroundColor: "#034"
  },
  ".cm-content": {
    caretColor: "#0e9"
  },
  "&.cm-focused .cm-cursor": {
    borderLeftColor: "#0e9"
  },
  "&.cm-focused .cm-selectionBackground, ::selection": {
    backgroundColor: "#074"
  },
  ".cm-gutters": {
    backgroundColor: "#045",
    color: "#ddd",
    border: "none"
  }
}, {dark: true})

const fixedHeightEditor = EditorView.theme({
  "&": {height: "450px"},
  ".cm-scroller": {overflow: "auto"}
})

let state = EditorState.create({
  doc: "print('Hello, World!')",
  extensions: [
    basicSetup, 
    python(),
    myTheme, 
    fixedHeightEditor,
    keymap.of([indentWithTab]),
  ],
});

let editor = new EditorView({
  extensions: [
    basicSetup, 
    // php(),
    // javascript(), 
    python(),
    myTheme, 
    fixedHeightEditor,
    keymap.of([indentWithTab]),
  ],
  state: state,
  parent: document.querySelector("#editor"),
});

// get the editor content
document.querySelector("#submit").addEventListener("click", () => {
  let content = editor.state.doc.toString();
  // console.log({content});
  window.dispatchEvent(new CustomEvent('editor:submit', { detail: content }));
});

// document.querySelector(".code_editor").addEventListener("submit", (event) => {
//   event.preventDefault();
//   let content = editor.state.doc.toString();
// // console.log({content});
//   window.dispatchEvent(new CustomEvent('editor:submit', { detail: content }));
// });