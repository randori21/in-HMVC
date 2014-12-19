
		var servicelinkdetailsURL = "http://localhost/adminProject/index.php/service/link/";
		var x=0;

		$("#linkdetailsPage").bind("pageinit", function(event) {
			link_read();
		});
		
		$("#link_kirim").click(function(){
			var link_id = $("#link_id").val();
			
			var link_address = $("#link_address").val();
			
			var link_nama = $("#link_nama").val();
			
			var link_keterangan = $("#link_keterangan").val();
			
			var jnsusr_jnsusr_id = $("#jnsusr_jnsusr_id").val();
						
			var uri = "";
			if(link_id ==""){
				if((link_nama !=="")&&(link_nama!== null)){
					uri = servicelinkdetailsURL+"link_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicelinkdetailsURL+"link_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"link_id": link_id,

						"link_address": link_address,

						"link_nama": link_nama,

						"link_keterangan": link_keterangan,

						"jnsusr_jnsusr_id": jnsusr_jnsusr_id,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							link_read();
							window.location.href = "index.html#link";
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
		