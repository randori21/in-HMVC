
		var servicejnsmenuURL = "http://localhost/adminProject/index.php/service/jnsmenu/";
		var x=0;

		$("#jnsmenu").bind("pageinit", function(event) {
			jnsmenu_read();
		});

		function jnsmenu_read() {
			$.getJSON(servicejnsmenuURL + "jnsmenu_read", function(data) {
				$("#listjnsmenu li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listjnsmenu").append(
						"<li ><a href='#details_jnsmenu' id='krm' data-krm="+ isi.jnsmenu_id +" onclick='jnsmenu_edit("+isi.jnsmenu_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.jnsmenu_head + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='jnsmenu_del("+ isi.jnsmenu_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.jnsmenu_id +">" +
						"</li>");
				});
				$("#listjnsmenu").listview("refresh");
			});
		}
		function jnsmenu_add(){	
			try {	
					console.log("buat baru");
				
						$("#jnsmenu_id").val("");
						$("#jnsmenu_head").val("");
						$("#jnsmenu_nama").val("");
						$("#jnsmenu_keterangan").val("");
						$("#jnsmenu_post").val("");
						$("#jnsmenu_file").val("");
						$("#users_id").val("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function jnsmenu_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicejnsmenudetailsURL+"jnsmenu_id_search", {
				"jnsmenu_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#jnsmenu_id").val(field.jnsmenu_id);
						$("#jnsmenu_head").val(field.jnsmenu_head);
						$("#jnsmenu_nama").val(field.jnsmenu_nama);
						$("#jnsmenu_keterangan").val(field.jnsmenu_keterangan);
						$("#jnsmenu_post").val(field.jnsmenu_post);
						$("#jnsmenu_file").val(field.jnsmenu_file);
						$("#users_id").val(field.users_id);														
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

		function jnsmenu_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicejnsmenuURL + "jnsmenu_del", {
						"jnsmenu_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							jnsmenu_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#jnsmenu";					
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
		function jnsmenu_sub(a){
			try {
				isi="pilihan jnsmenu";
				$.post(servicejnsmenuURL + "jnsmenu_read", {
					"jnsmenu_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.jnsmenu_id;
					nama = fieldsub.jnsmenu_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#jnsmenu_jnsmenu_id").append("<option value="+id+">"+nama+"</option>");
					$("#jnsmenu_jnsmenu_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#jnsmenu_jnsmenu_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function jnsmenu_refresh(){			
			$("#jnsmenu_jnsmenu_id option").remove();
			$("#jnsmenu_jnsmenu_id-menu li").remove();
		}
		