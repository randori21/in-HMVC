
		var servicehakURL = "http://localhost/adminProject/index.php/service/hak/";
		var x=0;

		$("#hak").bind("pageinit", function(event) {
			hak_read();
		});

		function hak_read() {
			$.getJSON(servicehakURL + "hak_read", function(data) {
				$("#listhak li").remove();var x = 1;
				$.each(data, function(index, isi) {
					$("#listhak").append(
						"<li ><a href='#details_hak' id='krm' data-krm="+ isi.hak_id +" onclick='hak_edit("+isi.hak_id+")' data-transition='slide'>" + 					
						"<h4>" + isi.hak_status + "</h4>" +
						"<span class='ui-li-count'>" + x++ + "</span></a>" +
						"<a href='#' onclick='hak_del("+ isi.hak_id +")' data-rel='popup'  data-role='button' id='popi' data-inline='true' data-transition='slide' data-isi="+ isi.hak_id +">" +
						"</li>");
				});
				$("#listhak").listview("refresh");
			});
		}
		function hak_add(){	
			try {	
					console.log("buat baru");
				
						$("#hak_id").val("");
						$("#hak_status").val("");
						$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");
						jnsusr_refresh();
						jnsusr_sub("");
			}catch(e){	  
				console.log("Kesalahan :"+e);
			}
		}
		function hak_edit(a){
			try {	
				$("radio").attr( "checked",false );$("label").removeClass("ui-btn-active");	
				$.post(servicehakdetailsURL+"hak_id_search", {
				"hak_id": a,
				}, function(data){		
					var x = 1;
					$("#pengumuman").hide();					
					$("#edit").show();	
					$("#status").hide();							
					$.each(data, function(i, field){
						$("#hak_id").val(field.hak_id);
						$("#hak_status").val(field.hak_status);
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

		function hak_del(a){
			var y = confirm("Anda yakin menghapus data ini?");
				if(y==true){
					try {
						$.post(servicehakURL + "hak_del", {
						"hak_id": a,
					}, function(data){							
						if(data.result == "success"){	
							$("#status").show();
							$.mobile.showPageLoadingMsg("a", "Hapus Data Berhasil");
							hak_read();
							$.mobile.hidePageLoadingMsg();					
							window.location.href = "index.html#hak";					
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
		function hak_sub(a){
			try {
				isi="pilihan hak";
				$.post(servicehakURL + "hak_read", {
					"hak_id": a,
				}, function(datasub){	
					$.each(datasub, function(i, fieldsub){
					id = fieldsub.hak_id;
					nama = fieldsub.hak_nama;
					if(id == a){act = "true";select='ui-btn-active';isi=nama;}else{act ="true";select="";}
					$("#hak_hak_id").append("<option value="+id+">"+nama+"</option>");
					$("#hak_hak_id-button .ui-btn-inner .ui-btn-text").text(isi);
					$("#hak_hak_id-menu").append('<li data-option-index="'+id+'" data-icon="false" class="ui-btn ui-btn-icon-right ui-li '+select+' ui-btn-up-c" role="option" data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-iconpos="right" data-theme="c" aria-selected="'+act+'"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="#" tabindex="-1" class="ui-link-inherit">'+nama+'</a></div></div></li>');
					
					});							
				}, "json");
			}catch(e){	  
				console.log("isi:"+e);
			}
		}
				
		function hak_refresh(){			
			$("#hak_hak_id option").remove();
			$("#hak_hak_id-menu li").remove();
		}
		