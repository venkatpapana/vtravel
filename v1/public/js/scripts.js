$(function() { //alert('hi');
		$('#one_way').click(function(){
			$('#to').prop('disabled',true);
			$( "#to" ).datepicker( "option", "disabled", true );
			$( "#to" ).next('img').css('opacity','0.2');
		});
		$('#return').click(function(){
			$('#to').prop('disabled',false);
			$( "#to" ).datepicker( "option", "disabled",false );
			$( "#to" ).next('img').css('opacity','1');
		});
		/*restrict numbers only starts here*/
		var prevKey = -1, prevControl = '';
		$(".budget,.travelers").keydown(function (event) {
			if (!(event.keyCode == 8                                // backspace
            || event.keyCode == 9                               // tab
            || event.keyCode == 17                              // ctrl
            || event.keyCode == 46                              // delete
            || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end
            || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
            || (event.keyCode >= 96 && event.keyCode <= 105)    // number on keypad
            || (event.keyCode == 65 && prevKey == 17 && prevControl == event.currentTarget.id))          // ctrl + a, on same control
			) {
            event.preventDefault();     // Prevent character input
			}
			else {
            prevKey = event.keyCode;
            prevControl = event.currentTarget.id;
			}
		});
		/*restrict numbers only ends here*/
		
	});
	$(function() {
	/*setting next friday as default date starts here*/
function getNextFridayDate()
	{
	var d = new Date();
 var weekday = new Array(7);
weekday[0]="Sunday";
weekday[1]="Monday";
weekday[2]="Tuesday";
weekday[3]="Wednesday";
weekday[4]="Thursday";
weekday[5]="Friday";
weekday[6]="Saturday";
  var todatday = d.getDay();
 if(todatday == 0)
{
d.setDate(d.getDate()+5);
}
if(todatday == 1)
{
d.setDate(d.getDate()+4);
}
if(todatday == 2)
{
d.setDate(d.getDate()+3);
}
if(todatday == 3)
{
d.setDate(d.getDate()+2);
}
if(todatday == 4)
{
d.setDate(d.getDate()+1);
}
if(todatday == 5)
{
d.setDate(d.getDate());
}
if(todatday == 6)
{
d.setDate(d.getDate()+6);
}
return d;

	}
	
	function getNextFridayDateTo()
	{
	var d = new Date();
 var weekday = new Array(7);
weekday[0]="Sunday";
weekday[1]="Monday";
weekday[2]="Tuesday";
weekday[3]="Wednesday";
weekday[4]="Thursday";
weekday[5]="Friday";
weekday[6]="Saturday";
 var todatday = d.getDay();
if(todatday == 0)
{
d.setDate(d.getDate()+7);
}
if(todatday == 1)
{
d.setDate(d.getDate()+6);
}
if(todatday == 2)
{
d.setDate(d.getDate()+5);
}
if(todatday == 3)
{
d.setDate(d.getDate()+4);
}
if(todatday == 4)
{
d.setDate(d.getDate()+3);
}
if(todatday == 5)
{
d.setDate(d.getDate()+2);
}
if(todatday == 6)
{
d.setDate(d.getDate()+8);
}
return d;

	}
	//ended
    $( "#from" ).datepicker({
	  showOn: "button",
	  buttonImage: "images/calenar.png",
	  buttonImageOnly: true,
	  minDate:0,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
	$("#from").datepicker('setDate', getNextFridayDate())
		/*calling next friday - ends here*/

	/*setting next sunday as default date starts here*/
	
    $( "#to" ).datepicker({
	  showOn: "button",
	  buttonImage: "images/calenar.png",
	  buttonImageOnly: true,
	  minDate:0,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
	$("#to").datepicker('setDate', getNextFridayDateTo());

  });
  /* Combox  starts here */
  (function( $ ) {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          //.attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
         // .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.data( "ui-autocomplete" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })( jQuery );
 
  $(function() {
    $( ".combobox" ).combobox();
    $( "#toggle" ).click(function() {
      $( ".combobox" ).toggle();
    });
	/*defalut css placeholder starts here*/
	$('.from .custom-combobox-input').attr('placeholder','Amsterdam(AMS)');
	$('.to .custom-combobox-input').attr('placeholder','Surprise Me!');
  });
   /* Combo box  ends here */
   /*Slide Toggle Customize your journey starts here*/
   $(function(){
		$('.customize_journey').hide();
		$('.more_options').click(function(){
			$('.customize_journey').slideToggle();
			//$('footer').css('bottom','0');
		});
		$('input, textarea').placeholder({color: 'red'});
   })
   /*Slide Toggle Customize your journey ends here*/
   /*background image slideshow starts here*/
	$(document).ready(function(){
		//$('.background img:gt(0)').hide();
		//setInterval(function(){
		//$('.background :first-child').fadeOut()
         //.next('img').fadeIn('slow')
         //.end().appendTo('.background');}, 
		//30000);
		/*by clicking on icons, disable the buttons - starts here*/
		$('.transport .air_plane').click(function(){
			$(this).toggleClass('disable_air_plane_btn');
		});
		$('.transport .car').click(function(){
			$(this).toggleClass('disable_car_btn');
		});
		$('.transport .train').click(function(){
			$(this).toggleClass('disable_train_btn');
		});
		$('.transport .bus').click(function(){
			$(this).toggleClass('disable_bus_btn');
		});
		$('.transport .cruise').click(function(){
			$(this).toggleClass('disable_cruise_btn');
		});
		$('.stay_section').click(function(){
			$(this).toggleClass('disable_stay_section_btn');
		});
		$('.transport .bus').click(function(){
			$(this).toggleClass('disable_transport_bus_btn');
		});
		$('.transport .bed').click(function(){
			$(this).toggleClass('disable_bed_btn');
		});
		$('.transport .apartment').click(function(){
			$(this).toggleClass('disable_apartment_btn');
		});
		$('.transport .hotels').click(function(){
			$(this).toggleClass('disable_hotels_btn');
		});
		/*by clicking on icons, disable the buttons - ends here*/
	});
   /*ends*/
   function DropDown(el) {
				this.dd = el;
				this.placeholder = this.dd.children('span');
				this.opts = this.dd.find('ul.dropdown > li');
				this.val = '';
				this.index = -1;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

					obj.opts.on('click',function(){
						var opt = $(this);
						obj.val = opt.text();
						obj.index = opt.index();
						obj.placeholder.text('' + obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-1').removeClass('active');
				});

			});
function DropDown(el) {
				this.dd1 = el;
				this.placeholder = this.dd1.children('span');
				this.opts = this.dd1.find('ul.dropdown > li');
				this.val = '';
				this.index = -1;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd1.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

					obj.opts.on('click',function(){
						var opt = $(this);
						obj.val = opt.text();
						obj.index = opt.index();
						obj.placeholder.text('' + obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}

			$(document).ready(function(){
				var dd1 = new DropDown( $('#dd1') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-1').removeClass('active');
				});
				/*expand and collapse functionality in results page starts here*/
				$('.expand_btn').click(function(){
					$('.customize_journey').slideToggle({});
					$('.expand_btn').toggleClass('active_expand_btn');
					$('.customize_journey').toggleClass('active_customize_journey');
				});
				/*expand and collapse functionality in results page ends here*/
				/*results page, evry second child, giving margin-left*/
				$(".main_result_boxes li:nth-child(2n)").css('margin-left','10px');
				/*ends*/
			});
//Scripts Updated on 18th April
$(function() {
	changeBackgroundImage();
	if($('body').hasClass('home')){
		setInterval(changeBackgroundImage, 10000);
	}
});
var imagesArray = [
		"images/backgrounds/background1.jpg", 
		"images/backgrounds/background2.jpg", 
		"images/backgrounds/background3.jpg", 
		"images/backgrounds/background5.jpg"
		];
var currentImage = 0;
function changeBackgroundImage(imagePath) {
	var showImage = imagePath || imagesArray[currentImage];
	$.anystretch(showImage, {speed: 1000, positionY : 'top'});
	currentImage++;
	if(currentImage >= imagesArray.length){
		currentImage = 0;
	}
}


$(function() {
    // Customize your journey 
    $(".search_buttons").click(function() {
	var btn_class = $(this).attr('class');
	var tmpArr = btn_class.split(' ');

	// get the main class of selected button 
	var main_class = tmpArr[0];

	if (btn_class.indexOf('disable') > -1) {
	    $("#" + main_class + "_value").val(0);
	} else {
	    $("#" + main_class + "_value").val(1);
	}

    });

    // Travel Time
    $("ul li.li_tt").click(function() {
	$("#travel_time").val($(this).find("a").text());
    });

    // Weather
    $("ul li.li_weather").click(function() {
	$("#weather").val($(this).find("a").text());
    });

});