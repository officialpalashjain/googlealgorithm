function custom_upload_image(ref)
{
	var formfield = jQuery(ref).prev('input[type="text"]').attr('name');
	var dtype = jQuery(ref).attr("data-type");
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true&amp;width=630');
	window.send_to_editor = function(html) {
		imgurl = jQuery(html).attr('src');
		jQuery(ref).prev('input[type="text"]').val(imgurl);
		tb_remove();
    }
    return false;
}