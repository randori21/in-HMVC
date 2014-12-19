
		var serviceletakURL = "http://localhost/adminProject/index.php/service/letak/";
		var x=0;

		$("#letak").bind("pageinit", function(event) {
			letak_read();
		});

		function letak_read() {
			$.getJSON(serviceletakURL + "letak_read", function(data) {
				$("#listletak li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listletak").append(
						"<li ><a href='#details_letak' id='krm' data-krm="+ isi.letak_id +" onclick='letak_edit("+isi.letak_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.letak_nama + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='letak_del("+ isi.letak_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.letak_id +">" +
						"</li>");
				});
				$("#listletak").listview("refresh");
			});
		}
		function letak_add(){	
			try {	
					console.log("buat baru");
				
						$("#letak_id").val("");
						$("#letak_nama").val("");
						$("#letak_keterangan").val("");
						$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");
						jnsmenu_refresh();
						jnsmenu_sub("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function letak_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(serviceletakdetailsURL+"letak_id_search", {
				"letak_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#letak_id").val(field.letak_id);
						$("#letak_nama").val(field.letak_nama);
						$("#letak_keterangan").val(field.letak_keterangan);
						jnsmenu_refresh();
						jnsmenu_sub(field.jnsmenu_jnsmenu_id);														
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

		function letak_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(serviceletakURL + "letak_del", {
						"letak_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							letak_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#letak";					
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
		function letak_sub(a){
			try {
				isi="pilihan letak";
				$.post(serviceletakURL + "letak_read", {
					"letak_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.letak_id;
					nama = fieldsub.letak_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#letak_letak_id").append("<option value="+id+">"+nama+"</option>");
					$("#letak_letak_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#letak_letak_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function letak_refresh(){			
			$("#letak_letak_id option").remove();
			$("#letak_letak_id-menu li").remove();
		}
		