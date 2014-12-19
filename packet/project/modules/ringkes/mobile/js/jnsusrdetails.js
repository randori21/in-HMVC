
		var servicejnsusrdetailsURL = "http://localhost/adminProject/index.php/service/jnsusr/";
		var x=0;

		$("#jnsusrdetailsPage").bind("pageinit", function(event) {
			jnsusr_read();
		});
		
		$("#jnsusr_kirim").click(function(){
			var jnsusr_id = $("#jnsusr_id").val();
			
			var jnsusr_nama = $("#jnsusr_nama").val();
			
			var jnsusr_keterangan = $("#jnsusr_keterangan").val();
						
			var uri = "";
			if(jnsusr_id ==""){
				if((jnsusr_nama !=="")&&(jnsusr_nama!== null)){
					uri = servicejnsusrdetailsURL+"jnsusr_add";
				}else{
					$("#status").show();
					$("#status").html("<span style='font-size: 16px;'  data-role='popup' id='popupLogin' data-theme='a' class='ui-corner-all'>Periksa Kembali</span>");	
				}
			}else{
				uri = servicejnsusrdetailsURL+"jnsusr_update";
			}	
			if(uri!=""){			
				try {
					$.post(uri, {
						"jnsusr_id": jnsusr_id,

						"jnsusr_nama": jnsusr_nama,

						"jnsusr_keterangan": jnsusr_keterangan,

					}, function(data){							
						if(data.result == "success"){	
							$("radio").attr( "checked",false );
							$("label").removeClass("ui-btn-active");
							
							$("#status").show();
							$("#status").html('<span style="font-size: 16px;" data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">Data berhasil di update</span>');	
							$.mobile.showPageLoadingMsg("a", "Proses Berhasil");
							jnsusr_read();
							window.location.href = "index.html#jnsusr";
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
		