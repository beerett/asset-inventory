{
    function log(username,action){
		
		$.ajax({
				url: "log.php",
				data: ({
					username:username,
					action:action
				})
			}).done(function(data) {
				
			});
	
	}
	$(document).ready(function() {
	
		//hide dialogs
		
		$('#transfer').hide();
		
		
		$('#login').on('click','#loginsave',function(){	
			$.cookie('username',$('#username').val());
			username = $.cookie('username');
			if (username == "brett" || username == "test" ) {
				
				username = $.cookie('username');
				action = username + " logged in.";
			
				log(username,"Logged in");
		
				location.reload();
			}
			else {
				$.removeCookie('username');
			}
		});
			
		if ($.cookie('username')) {
			
		$('#un').html("Logged in as (<a id='unclick' href='#'>" + $.cookie('username') + "</a>)");
		
		$("#filter select, input").uniform();
		
		
		 //username click top right - logout?
		$('#unclick').on('click',function(){
			log($.cookie('username'),"Logged out");
			$.removeCookie('username');
			
			location.reload();
		});
		
		//tabs
		$('#main').css('visibility','visible');
		$("#main").tabs({
			fxAutoHeight: true,
			beforeLoad: function(event, ui) {
				ui.jqXHR.error(function() {
					ui.panel.html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo.");
				});
			},
			heightStyle: 'fill'

		});
	
		//stripe rows of table
		
		$('#main').on('tabsload', function(event, ui) {

			stripe();
			$("select, input").uniform();
			$('#totalc').text($('.rows').length);

		});
		
		//icons for buttons
		
		$('#btnDelete').button({
			icons: { 
				primary: "ui-icon-circle-close" 
			}
		});
		
		$('#btnAdd').button({ 
			icons: { 	
				primary: "ui-icon-circle-plus"	
			}
		});
		
		$('#btnOwner').button({
			icons: {
				primary: "ui-icon-circle-close"
			}
		});
       
		
		
		// right click menu
		$(document).on('contextmenu','.rows',function(e){
			event.preventDefault(); 
			$('.selected').removeClass('selected');
			if(!$(e.target).hasClass('.rows')) {
			
				$(".rightclick").finish().fadeIn().
				
				css({
					top: event.pageY + "px",
					left: event.pageX + "px"
				});
			}
			$(this).addClass('selected');
		});
		
		$('.rows td').bind("contextmenu", function (event) {
    
			event.preventDefault(); //prevent normal right click menu
			
		});
		
		
		//hide right click menu when left click elsewhere
		$(document).bind("mousedown", function (e) {
		
			if (!$(e.target).parents(".rightclick").length > 0) {
			$(".rightclick").fadeOut();
			}
			
		});
				
		$(".rightclick li").click(function(){
			
			// This is the triggered action name
			switch($(this).attr("data-action")) {
				
				
				case "transfer": // transfer right click
				
					prev = $('tr.rows.selected td').eq(1).text();
					id = $('tr.rows.selected > td a').attr('sqlid');
					
					$('#prevowner').text(prev);
					$('#transfer').dialog().fadeIn;
					
				break;
				
				case "edit":  // edit right click
					prev = $('tr.rows.selected td').eq(1).text();
					id = $('tr.rows.selected > td a').attr('sqlid');
					asset = $('tr.rows.selected td').eq(0).text();
					type = $('tr.rows.selected td').eq(2).text();
					model = $('tr.rows.selected td').eq(3).text();
					name = $('tr.rows.selected td').eq(4).text();
					servicetag = $('tr.rows.selected td').eq(5).text();
					express = $('tr.rows.selected td').eq(6).text();
					site = $('tr.rows.selected td').eq(7).text();
					room = $('tr.rows.selected td').eq(8).text();
					dept = $('tr.rows.selected td').eq(9).text();
					notes = $('tr.rows.selected td').eq(10).text();
					$('#newasset').val(asset);
					$('#newtype').val(type);
					$('#newmodel').val(model);
					$('#newname').val(name);
					$('#newservicetag').val(servicetag);
					$('#newexpress').val(express);
					$('#newsite').val(site);
					$('#newroom').val(room);
					$('#newdept').val(dept);
					$('#newnotes').val(notes);
					$('#edit').dialog();
				
				break;
				
				
				case "update":  // update right click

				break;
				
				
			
			}
		  
			// Hide it AFTER the action was triggered
			$(".rightclick").fadeOut();
			
		});
		
		// view agreement icon click event 
		//
		
		
        $('body').on('click', 'a.agr', function() {
            
			//grabs id(sql unique row id)  , server sends back jpg as base64
            id = $(this).attr('sqlid');

            $.ajax({
                url: "agreement.php",
                data: ({
                    t: 'computers',
                    id: id
                })
            }).done(function(data) {
                $('#agreement').html('<img src="data:image/jpg;base64,' + data + '" />');
            });
			
			
            $('#agreement').dialog().fadeIn();

        });
		
		// select row click event
		//
		
        $('body').on('click', 'tr.rows', function() {

            $(this).toggleClass('selected');

        });
		
		
		// transfer button click event
		//
		
        $('body').on('click', '#btnOwner', function() {
			
			//sets prev owner name and the id of the sql entry to change
			
            prev = $('tr.rows.selected td').eq(1).text();
            id = $('tr.rows.selected > td a').attr('sqlid');
			
			$('#prevowner').text(prev);
            $('#transfer').dialog().fadeIn;
            
			
     

        });
		
		// save button for owner change event
		
		$('#transfer').on('click','button',function(){
			
			//pass text from input box to newemp 
			
			prev = $('#prevowner').text();
			newemp = $('#newemp').val();
			
			$.ajax({
                url: "update.php",
                data: ({
                    newemp: newemp ,
                    id: id
                })

            }).done(function(data) {
				log($.cookie('username'),"Updated ID(" + id + ") from : "+ prev + " to : " + newemp); 
                $('#transfer').dialog('close');
            });
		
		});
		  
		$('#main').fadeIn();
		}
		else {
			$('#login').css('visibility','visible').dialog();
		}	
		
  });
	
	//stripes the table rows odd/even
	//
	
    function stripe() {
        $('tr:even').css('background', '#ddd');
    }

	
		//filter by site checkbox events
	
                /* $('#filtermm').change(function(){ 
                	
                	if (this.checked) {
                		$('#tabComputers').attr('href','fetch.php?t=computer&school=MM');
                		$('#main').tabs('load',1);
                		
                	}
                });
                $('#filterms').change(function(){ 
                	
                	if (this.checked) {
                		$('#tabComputers').attr('href','fetch.php?t=computer&school=MS');
                		$('#main').tabs('load',1);
                		
                	}
                });
                $('#filterhs').change(function(){  
                	
                	if (this.checked) {
                		$('#tabComputers').attr('href','fetch.php?t=computer&school=HS');
                		$('#main').tabs('load',1);
                		
                	}
                });
                $('#filterfp').change(function(){ 
                	
                	if (this.checked) {
                		$('#tabComputers').attr('href','fetch.php?t=computer&school=FP');
                		$('#main').tabs('load',1);
                		
                	}
                });
                $('#filterdo').change(function(){ 
                	
                	if (this.checked) {
                		$('#tabComputers').attr('href','fetch.php?t=computer&school=DO');
                		$('#main').tabs('load',1);
                		
                	}
                });
                */
	
}