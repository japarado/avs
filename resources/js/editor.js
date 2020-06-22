import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

ClassicEditor.create(document.querySelector("#editor"))
	.then(editor => console.log(editor))
	.catch(err => console.log(err))

// import Quill from "quill/core";

// import Toolbar from "quill/modules/toolbar";
// import Snow from "quill/themes/snow";

// import Bold from "quill/formats/bold";
// import Italic from "quill/formats/italic";
// import Header from "quill/formats/header";

// Quill.register({
// 	modules: {
// 		toolbar: {
// 			container: document.getElementById("toolbar")
// 		}
// 	},
// 	"themes/snow": Snow,
// 	"formats/bold": Bold,
// 	"formats/italic": Italic,
// 	"formats/header": Header
// });
// Quill.debug("info");



// const editor = new Quill("#editor");
// console.log(editor)
