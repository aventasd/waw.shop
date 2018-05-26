var App = (function () {
	'use strict';

  App.textEditors = function( ){

    //Summernote
    $('.summernote').summernote({
      height: 300
    });

    $('.note-editable').on("blur", function(){
    var editor = $(this).closest('.note-editor').siblings('textarea.summernote');
    editor.html(editor.code());
    });


  }

  return App;
})(App || {});
