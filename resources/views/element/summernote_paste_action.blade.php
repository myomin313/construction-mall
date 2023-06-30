<script>
     $('#summernote1,#description,#service,.join-description,#vission,#detail,#about_us,#freelancer_description,#experience_description,#update_description,#update_experience_description,$project_detail,#edit_project_detail,#blog_detail,#summary,#policy,#privacy,#terms_and_condition,#summernote2,#summernote3,#summernote4,#summernote5,.summernote6,#blog_detail').on('summernote.paste', function(e, ne) {
         var bufferText = ((ne.originalEvent || ne).clipboardData || window.clipboardData).getData('Text');
         ne.preventDefault();
         document.execCommand('insertText', false, bufferText)
    });
</script>