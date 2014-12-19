
		var servicepostdetailsURL = "http://localhost/adminProject/index.php/service/post/";
		var x=0;

		$("#postdetailsPage").bind("pageinit", function(event) {
			post_read();
		});
		
		$("#post_kirim").click(function(){
			var post_id = $("#post_id").val();
			
			var post_author = $("#post_author").val();
			
			var post_date = $("#post_date").val();
			
			var post_date_edit = $("#post_date_edit").val();
			
			var post_nama = $("#post_nama").val();
			
			var post_content = $("#post_content").val();
			
			var post_keywords = $("#post_keywords").val();
						
			var post_status = $("[name='post_status']:checked").val();
			
			var post_tag = $("#post_tag").val();
			
			var post_picture = $("#post_picture").val();
						
			var uri = "";
			if(post_id ==""){
				if((post_nama !=="")&&(post_nama!== null)){
					uri = servicepostdetailsURL+"post_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicepostdetailsURL+"post_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"post_id": post_id,

						"post_author": post_author,

						"post_date": post_date,

						"post_date_edit": post_date_edit,

						"post_nama": post_nama,

						"post_content": post_content,

						"post_keywords": post_keywords,

						"post_status": post_status,

						"post_tag": post_tag,

						"post_picture": post_picture,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							post_read();
							window.location.href = "index.html#post";
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
		