
		var servicejnsusrURL = "http://localhost/adminProject/index.php/service/jnsusr/";
		var x=0;

		$("#jnsusr").bind("pageinit", function(event) {
			jnsusr_read();
		});

		function jnsusr_read() {
			$.getJSON(servicejnsusrURL + "jnsusr_read", function(data) {
				$("#listjnsusr li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listjnsusr").append(
						"<li ><a href='#details_jnsusr' id='krm' data-krm="+ isi.jnsusr_id +" onclick='jnsusr_edit("+isi.jnsusr_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.jnsusr_nama + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='jnsusr_del("+ isi.jnsusr_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.jnsusr_id +">" +
						"</li>");
				});
				$("#listjnsusr").listview("refresh");
			});
		}
		function jnsusr_add(){	
			try {	
					console.log("buat baru");
				
						$("#jnsusr_id").val("");
						$("#jnsusr_nama").val("");
						$("#jnsusr_keterangan").val("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function jnsusr_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicejnsusrdetailsURL+"jnsusr_id_search", {
				"jnsusr_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#jnsusr_id").val(field.jnsusr_id);
						$("#jnsusr_nama").val(field.jnsusr_nama);
						$("#jnsusr_keterangan").val(field.jnsusr_keterangan);														
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

		function jnsusr_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicejnsusrURL + "jnsusr_del", {
						"jnsusr_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							jnsusr_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#jnsusr";					
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
		function jnsusr_sub(a){
			try {
				isi="pilihan jnsusr";
				$.post(servicejnsusrURL + "jnsusr_read", {
					"jnsusr_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.jnsusr_id;
					nama = fieldsub.jnsusr_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#jnsusr_jnsusr_id").append("<option value="+id+">"+nama+"</option>");
					$("#jnsusr_jnsusr_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#jnsusr_jnsusr_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function jnsusr_refresh(){			
			$("#jnsusr_jnsusr_id option").remove();
			$("#jnsusr_jnsusr_id-menu li").remove();
		}
		