
		var servicejnsmenudetailsURL = "http://localhost/adminProject/index.php/service/jnsmenu/";
		var x=0;

		$("#jnsmenudetailsPage").bind("pageinit", function(event) {
			jnsmenu_read();
		});
		
		$("#jnsmenu_kirim").click(function(){
			var jnsmenu_id = $("#jnsmenu_id").val();
			
			var jnsmenu_head = $("#jnsmenu_head").val();
			
			var jnsmenu_nama = $("#jnsmenu_nama").val();
			
			var jnsmenu_keterangan = $("#jnsmenu_keterangan").val();
			
			var jnsmenu_post = $("#jnsmenu_post").val();
			
			var jnsmenu_file = $("#jnsmenu_file").val();
			
			var users_id = $("#users_id").val();
						
			var uri = "";
			if(jnsmenu_id ==""){
				if((jnsmenu_nama !=="")&&(jnsmenu_nama!== null)){
					uri = servicejnsmenudetailsURL+"jnsmenu_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicejnsmenudetailsURL+"jnsmenu_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"jnsmenu_id": jnsmenu_id,

						"jnsmenu_head": jnsmenu_head,

						"jnsmenu_nama": jnsmenu_nama,

						"jnsmenu_keterangan": jnsmenu_keterangan,

						"jnsmenu_post": jnsmenu_post,

						"jnsmenu_file": jnsmenu_file,

						"users_id": users_id,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							jnsmenu_read();
							window.location.href = "index.html#jnsmenu";
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
		