$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
});


$('#context-list').DataTable({
    "ordering": false,
    "scrollX": true
});
$('#article-list').DataTable({
    "ordering": false,
    "scrollX": true
});

$('.search-article-id').select2({
    placeholder: "Search by article id"
});
$('#article-title-eng').select2({
    placeholder: "Search or create article title",
    tags: true
});
$('#article-title-chi').select2({
    placeholder: "Search or create article title",
    tags: true
});
$('.search-context-id').select2({
    placeholder: "Search by context id"
});
$('.search-term').select2({
    placeholder: "Search by term"
});

//Tags input
$(".term-input").tagsinput('items')


//Profile image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

// TinyMCE

tinymce.init({
    selector: 'textarea#eng-context-area',
    height: 280,
    menubar: false,
    placeholder: "Context",
    branding: false,
    elementpath: false,
    toolbar: ' | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_style: 'body { font-family:Open Sans,sans-serif; font-size:14px }'
});

tinymce.init({
    selector: 'textarea#chi-context-area',
    height: 280,
    menubar: false,
    placeholder: "Context",
    branding: false,
    elementpath: false,
    toolbar: ' | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_style: 'body { font-family:Open Sans,sans-serif; font-size:14px }'
});

tinymce.init({
    selector: 'textarea#eng-article-area',
    height: 280,
    menubar: false,
    placeholder: "Article",
    branding: false,
    elementpath: false,
    toolbar: ' | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_style: 'body { font-family:Open Sans,sans-serif; font-size:14px }'
});

tinymce.init({
    selector: 'textarea#chi-article-area',
    height: 280,
    menubar: false,
    placeholder: "Article",
    branding: false,
    elementpath: false,
    toolbar: ' | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_style: 'body { font-family:Open Sans,sans-serif; font-size:14px }'
});