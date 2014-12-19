
		var servicegallerydetailsURL = "http://localhost/adminProject/index.php/service/gallery/";
		var x=0;

		$("#gallerydetailsPage").bind("pageinit", function(event) {
			gallery_read();
		});
		
		$("#gallery_kirim").click(function(){
			var gallery_id = $("#gallery_id").val();
			
			var gallery_nama = $("#gallery_nama").val();
			
			var gallery_thumb = $("#gallery_thumb").val();
			
			var gallery_keterangan = $("#gallery_keterangan").val();
			
			var jnsusr_jnsusr_id = $("#jnsusr_jnsusr_id").val();
						
			var uri = "";
			if(gallery_id ==""){
				if((gallery_nama !=="")&&(gallery_nama!== null)){
					uri = servicegallerydetailsURL+"gallery_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicegallerydetailsURL+"gallery_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"gallery_id": gallery_id,

						"gallery_nama": gallery_nama,

						"gallery_thumb": gallery_thumb,

						"gallery_keterangan": gallery_keterangan,

						"jnsusr_jnsusr_id": jnsusr_jnsusr_id,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							gallery_read();
							window.location.href = "index.html#gallery";
						}else {
							$("#status").show();
							$("#status").html('<span style="font-size: 10px;">Coba lagi!</span>');							
						}
					}, "json");
				}catch(e){	  
					console.log("isi:"+e);
				}
			}
		});
		