
		var servicewingetURL = "http://localhost/adminProject/index.php/service/winget/";
		var x=0;

		$("#winget").bind("pageinit", function(event) {
			winget_read();
		});

		function winget_read() {
			$.getJSON(servicewingetURL + "winget_read", function(data) {
				$("#listwinget li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listwinget").append(
						"<li ><a href='#details_winget' id='krm' data-krm="+ isi.winget_id +" onclick='winget_edit("+isi.winget_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.winget_nama + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='winget_del("+ isi.winget_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.winget_id +">" +
						"</li>");
				});
				$("#listwinget").listview("refresh");
			});
		}
		function winget_add(){	
			try {	
					console.log("buat baru");
				
						$("#winget_id").val("");
						$("#winget_nama").val("");
						$("#winget_file").val("");
						$("#winget_status").val("");
						$("#winget_posisi").val("");
						$("#winget_keterangan").val("");
						$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");
						jnsusr_refresh();
						jnsusr_sub("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function winget_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicewingetdetailsURL+"winget_id_search", {
				"winget_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#winget_id").val(field.winget_id);
						$("#winget_nama").val(field.winget_nama);
						$("#winget_file").val(field.winget_file);
						$("#winget_status").val(field.winget_status);
						$("#winget_posisi").val(field.winget_posisi);
						$("#winget_keterangan").val(field.winget_keterangan);
						jnsusr_refresh();
						jnsusr_sub(field.jnsusr_jnsusr_id);														
						if(field.POST_STATUS == 1){
							$("#stat").attr( "checked",true );
							$("label.ui-btn.ui-corner-all.ui-btn-inherit.ui-btn-icon-left").removeClass("ui-checkbox-off");
							$("label.ui-btn.ui-corner-all.ui-btn-inherit.ui-btn-icon-left").addClass( "ui-checkbox-on" );
							$(".ui-slider-label.ui-slider-label-a.ui-btn-active" ).css({"width":"100%"});
							$(".ui-slider-label.ui-slider-label-b" ).css({"width":"0"});
							$("a.ui-slider-handle.ui-slider-handle-snapping.ui-btn.ui-shadow" ).attr({"aria-valuenow":"on","aria-valuetext":"On","title":"On"} );
							$("a.ui-slider-handle.ui-slider-handle-snapping.ui-btn.ui-shadow" ).css({"left":"100%"});									
						}
					});
				}, "json");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}

		function winget_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicewingetURL + "winget_del", {
						"winget_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							winget_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#winget";					
						}else {
							$("#status").show();
							$("#status").html("<span style='font-size: 10px;'>Coba lagi!</span>");							
						}
					}, "json");
				}catch(e){	  
					alert("isi:"+e);
				}
			}
		}
		function winget_sub(a){
			try {
				isi="pilihan winget";
				$.post(servicewingetURL + "winget_read", {
					"winget_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.winget_id;
					nama = fieldsub.winget_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#winget_winget_id").append("<option value="+id+">"+nama+"</option>");
					$("#winget_winget_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#winget_winget_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function winget_refresh(){			
			$("#winget_winget_id option").remove();
			$("#winget_winget_id-menu li").remove();
		}
		