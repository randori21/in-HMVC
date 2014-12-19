
		var servicegambardetailsURL = "http://localhost/adminProject/index.php/service/gambar/";
		var x=0;

		$("#gambardetailsPage").bind("pageinit", function(event) {
			gambar_read();
		});
		
		$("#gambar_kirim").click(function(){
			var gambar_id = $("#gambar_id").val();
			
			var gambar_nama = $("#gambar_nama").val();
			
			var gambar_file = $("#gambar_file").val();
			
			var gambar_alt = $("#gambar_alt").val();
			
			var gambar_post = $("#gambar_post").val();
			
			var post_post_id = $("#post_post_id").val();
						
			var uri = "";
			if(gambar_id ==""){
				if((gambar_nama !=="")&&(gambar_nama!== null)){
					uri = servicegambardetailsURL+"gambar_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicegambardetailsURL+"gambar_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"gambar_id": gambar_id,

						"gambar_nama": gambar_nama,

						"gambar_file": gambar_file,

						"gambar_alt": gambar_alt,

						"gambar_post": gambar_post,

						"post_post_id": post_post_id,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							gambar_read();
							window.location.href = "index.html#gambar";
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
		