
		var servicemediadetailsURL = "http://localhost/adminProject/index.php/service/media/";
		var x=0;

		$("#mediadetailsPage").bind("pageinit", function(event) {
			media_read();
		});
		
		$("#media_kirim").click(function(){
			var media_id = $("#media_id").val();
			
			var media_nama = $("#media_nama").val();
			
			var media_file = $("#media_file").val();
			
			var media_alt = $("#media_alt").val();
			
			var media_post = $("#media_post").val();
			
			var post_post_id = $("#post_post_id").val();
						
			var uri = "";
			if(media_id ==""){
				if((media_nama !=="")&&(media_nama!== null)){
					uri = servicemediadetailsURL+"media_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicemediadetailsURL+"media_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"media_id": media_id,

						"media_nama": media_nama,

						"media_file": media_file,

						"media_alt": media_alt,

						"media_post": media_post,

						"post_post_id": post_post_id,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							media_read();
							window.location.href = "index.html#media";
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
		