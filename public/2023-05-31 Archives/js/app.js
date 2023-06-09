
jQuery.fn.extend({

  RW_setActions: function(actions){
        var $this= this;
        if( actions instanceof Object)
            Object.keys(actions).forEach(function(key,i){
                if(typeof actions[key]=='function'){
                    
                    $this.on(key,actions[key]);
                }
            });
        
            
    },
  RW_appendAll: function(elems){
    var $this= $(this);
      if(Array.isArray(elems))
          elems.forEach(function(val,i){

              $this.append(val.render());
          });
      else
        Object.keys(elems).forEach(function(key,i){  
                                        
                    elems[key].render().appendTo($this);
            });


  }

})



function inputForm(params){

  var self ={};

  var _label  =$('<label></label>');
  var _input= $( '<input/>');
  var _div = $('<div></div>');

  function init(){
    // label
    _label.attr({for:params.id?params.id:'',class:params.labelClass?params.labelClass:''})
    _label.text(params.name?params.name:'');

    // input
    _input.attr({
      id:params.id?params.id:'',
      required:params.required?params.required:'false',
      maxlength:params.maxlength?params.maxlength:32
    })
    if(params.value!=undefined)
        self.setValue(params.value);

    _input.RW_setActions(params.actions);

    // div
    _div.attr({class:params.class?params.class:''});
    
    
  }
  
   
  self.getValue= function(){
    return _input.val();
  }

  self.setValue=function(val){

    _input.val(val);
  }
  
  self.on=function(event,fn){
      _input.on(event,function(){ fn(self,_input)});
  }

  self.onUpdate=function(fn){
       _input.on("change",function(){ fn(self,_input)});
  }

  self.render=function(){

      _div.append(_label).append(_input);
      return _div;
   }

   self.destroy= function(){
      _input =null;
      _label =null;
      _div.remove();
   }

  init();
  return self;
}



var templates= (function(){

    var temp= {};


    temp.card=function(params){


      var self={};
      var _card= $('<div class="card"></div>');
      var _title = $('<div class="card-title"></div>');
      var _content = $('<div class="card-content"></div>');
      var _actions = $('<div class="card-action"></div>');


      function init(){

          if(params.title){
            _title.text(params.title)  
            _card.append(_title);
          }

        _card.append(_content)
              .append(_actions)
              .attr(params.attr?params.attr:{})
              .addClass('card');


      }

      self.setContent=function(content){
        
        content.addClass('row');
        _content.append(content);
      }

      self.render= function(){
        return _card;
      }

      self.addAction=function(params){
          var _btn=$('<button></button>');
          _btn.attr(params.attr?params.attr:{});
          _btn.text(params.text);
          _btn.on('click',function(){
            params.click(_btn);
          });
          _actions.append(_btn);
      }

      self.destroy=function(){
        _card.remove();
      }
      init();
      return self;


    }
    

    

    temp.locationForm=function(params){

      console.log(params)

      var self= {};
      var _data={};
      var _content = $('<div"></div>');
      var subBtn = $('<button class="btn"></button>');

      var _card= null;
      var _formState='NEW';
      var _onSubmit;
      var _onDelete;

      
      self.form = null;


      function init(){
          if(!params)
             params={index:0};
          if(!params.index) params.index=0;
          
          var idForm= 'location_'+params.index +'_';

            self.form={
               interlocutor:inputForm({id:idForm +'interlocutor',name:'Interlocuteur',class:'col s12 m4', type:'text'}),
               streetNumber:inputForm({id:idForm +'streetNumber',name:'N°',class:'col s4 m4', type:'text'}),
               route:inputForm({id:idForm + 'route',name:'Rue',class:'col s12 m4', type:'text'}),
               postalCode:inputForm({id:idForm +'postalCode',name:'Code postale',class:'col s12 m4', type:'text'}),
               locality:inputForm({id:idForm +'locality',name:'Ville',class:'col s12 m4', type:'text'}),
               country:inputForm({id:idForm +'country',name:'Pays',class:'col s12 m4', type:'text'}),
               tel:inputForm({id:idForm +'tel',name:'Tel',class:'col s12 m4', type:'text'}),
               email:inputForm({id:idForm +'email',name:'Email',class:'col s12 m4', type:'text'}),
               fax:inputForm({id:idForm +'fax',name:'Fax',class:'col s12 m4', type:'text'}),
             };

              _content.RW_appendAll(self.form)
              _card=temp.card({attr:{class:''}});

              
              _card.setContent(_content);
              _card.addAction({text:'Enregister',attr:{class:'btn'}, click:function(btn){_onSubmit(self.getState(),btn)}})
              _card.addAction({text:'Supprimer',attr:{class:'btn red'}, click:function(btn){

                var btnConfirmation=$('<button class="btn-flat toast-action">Confirmer</button>').on('click', function(){
                  if(_data['id'])
                    _onDelete(self.getState(),btn)
                  self.destroy();
                })

                M.toast({inDuration:20,html:btnConfirmation})
              }})
            
            if(params.data)
              selef.setData(params.data);
        

      }

      self.onUpdate=function(fn){

        Object.keys(self.form).forEach(function(name,index){
               self.form[name].onUpdate(function(inputForm,elem){
                  fn(inputForm,elem);
               })
          });

      }

           
      
      self.getValue=function(){
        var val={};
           Object.keys(self.form).forEach(function(name,index){
               val[name]=self.form[name].getValue();
          });
          return val;
      }

      self.setData=function(data){
            
           _data=data;
           if(data['id'])
              self.changeFormState();

           Object.keys(data).forEach(function(name,index){
            if((self.form[name]!=undefined)){

               self.form[name].setValue(data[name]);
            }
          });
          console.log(data, self.form)
      }

      self.getState=function(){
        return {
          formState:_formState,
          location:_data,
          data:self.getValue()
        };
      }

      self.changeFormState=function(){
        if(_formState=='NEW')
            _formState='EDIT';
      }
      
      
        self.render=function(){
            return _card.render();
        } 

        
        self.submit=function(fn){
          _onSubmit=fn;
          
        }
        self.delete=function(fn){
         
            _onDelete=fn;  
        }


        self.destroy=function(){
          _card.destroy();
        };
        init();

       

      return  self;;
  }






  return temp;
})();



var App = (function(){

	this.baseUrl = '';

	this.init = function(){

      var getUrl = window.location;
      this.baseUrl = getUrl.protocol + "//" + getUrl.host + "/";

      this.initNav();
			
      this.initDatePiker();
      this.initTimePiker();
      this.initModal();
      this.initCollection();
      this.initTabs();
      this.initMask();
      $(".dropdown-trigger").dropdown();
      this.initLocationCustomer();

      $(document).on('click',function(){

          $('.app-autocomplete').hide();
      });


      this.enableProfile();
      this.disableProfile();
 
          
	}



  	this.getOptionsDate= function( defaultDate) {

        return {
              defaultDate: defaultDate,
              setDefaultDate:true,
              format:'dd/mm/yyyy',
              i18n:{
                cancel: 'Annuler',
                  clear:  'Effacer',
                    months:[
                    'Janvier',
                    'Février',
                    'Mars',
                    'Avril',
                    'Mai',
                    'Juin',
                    'Juillet',
                    'Août',
                    'Septembre',
                    'Octobre',
                    'Novembre',
                    'Décembre'
                  ],
                  monthsShort :[
                          'Jan',
                          'Fév',
                          'Mar',
                          'Avr',
                          'Mai',
                          'Jui',
                          'Juil',
                          'Aoû',
                          'Sep',
                          'Oct',
                          'Nov',
                          'Déc'
                        ],
                  weekdays:[
                        'Dimanche',
                        'Lundi',
                        'Mardi',
                        'Mercredi',
                        'Jeudi',
                        'Vendredi',
                        'Samedi'
                      ],

                  weekdaysShort:[
                  'Dim',
                  'Lun',
                  'Mar',
                  'Mer',
                  'Jeu',
                  'Ven',
                  'Sam'
                  ],            
            }
          };

      }


      this.initNav= function(){
        $('.sidenav').sidenav();
      }

      this.parseDate= function(text){
        var date = new Date();
        var textSplited= text.split('/').map(function(item){
          return parseInt(item);
        });
        console.log(textSplited);
        date.setDate(textSplited[0]);
        date.setMonth(textSplited[1]-1);
        date.setYear(textSplited[2]);
        return date;
      }

      this.initDatePiker=function(){
        var elems = document.querySelectorAll('.datepicker');
        
        elems.forEach(function(item){
              var date = this.parseDate(item.value)

             M.Datepicker.init(item, this.getOptionsDate(date));
        })
      
        
        //console.log(instances[2])
      }


      this.initTimePiker=function(){
        var elems = document.querySelectorAll('.timepicker');
         M.Timepicker.init(elems, {twelveHour:false});
      }

      this.initSelect=function(idSelect, params){
      //  $(idSelect).select2(params);
      }


      this.initModal=function(){
         var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, {});
      }



     this.uploadImageBase64 = function (content, success, error){

      	var formData = new FormData();

      	formData.append('image', content);
      	

      	var xhr = new XMLHttpRequest();
		// Add any event handlers here...
		xhr.open('POST', '/images/base64', true);

		//Request traitement
		xhr.addEventListener('readystatechange', function() {
		    if (xhr.readyState === XMLHttpRequest.DONE) { // La constante DONE appartient à l'objet XMLHttpRequest, elle n'est pas globale
		        success(JSON.parse(xhr.responseText))
		    }else{

		    	error(xhr);
		    }		
		});
		// Send Request with body
		xhr.send(formData);	
	}


	this.initTabs = function(){
			var elems = document.getElementsByClassName('tabs');

			for(var i=0; i<elems.length; i++)
				M.Tabs.init(elems[i],{});
	}


	this.initSignature=function(name){
		if(!name)
			throw name + " signature dont found";
		var image = document.getElementById('signature-'+name+'-render');

		var canvas= document.getElementById('signature-'+name)
		if(!canvas)
        return;
    var input= document.getElementById('appbundle_mission_'+name+'_signature');

			var signaturePad = new SignaturePad(canvas, {
				  backgroundColor: 'rgba(255, 255, 255, 0)',
				  penColor: 'rgb(0, 0, 0)'
				});
			var saveButton = document.getElementById('signature-'+name+'-save');
			var cancelButton = document.getElementById('signature-'+name+'-clear');

			saveButton.addEventListener('click', function (event) {
				event.preventDefault();
				event.stopPropagation()
			  var data = signaturePad.toDataURL('image/png');
			  
			  App.uploadImageBase64(data,function(resp){

			  		input.value= resp.id;
			  		image.src= '/images/'+resp.name;
			  		canvas.style.display="none";
			  },function(error) { console.log(error)})
			  //image.src= data;

			  
			// Send data to server instead...
			  //window.open(data);
			});

			cancelButton.addEventListener('click', function (event) {
				event.preventDefault();
				 canvas.style.display="block";
				 input.value= "";
				 image.src= '';
				event.stopPropagation
			  signaturePad.clear();
			});
	    
	}





    this.initCollection=function(){

      $('.add-another-collection-widget').click(function (e) {

          
          var list = jQuery(jQuery(this).attr('data-list'));
          // Try to find the counter of the list
          var counter = list.data('widget-counter') | list.children().length;
          // If the counter does not exist, use the length of the list
          if (!counter) { counter = list.children().length; }

          // grab the prototype template
          var newWidget = list.attr('data-prototype');
          // replace the "__name__" used in the id and name of the prototype
          // with a number that's unique to your emails
          // end name attribute looks like name="contact[emails][2]"
          newWidget = newWidget.replace(/__name__/g, counter);
          var $widget= $('<div class="card"><div class="card-content">'+newWidget+'</div></div>');
          // Increase the counter
          counter++;
          // And store it, the length cannot be used if deleting widgets is allowed
          list.data(' widget-counter', counter);

          var removeBtn=$('<button class="btn red"> <i class="material-icons">delete</i></button>')
          $action=$('<div class="card-action"></div>')

          $action.appendTo($widget)
          $($action).append(removeBtn)
          removeBtn.on('click',function(event){ 
            
            event.preventDefault();
            $widget.parent().remove();
             if(counter>0)
             counter--; 
            
            list.data(' widget-counter', counter);
          })
          // create a new list element and add it to the list
          var newElem = jQuery(list.attr('data-widget-tags')).html($widget);
          newElem.appendTo(list);
      });
  }


    function select2Customers(){
      return {
            allowClear: true,
            placeholder: "----",
                ajax: {
                      url: '/api/customers',
                      data: function (params) {
                        var query = {
                          search: params.term,
                        }
                        return query;
                      },
                       processResults: function (data) {
                          // Tranforms the top-level key of the response object from 'items' to 'results'
                          return {
                            results: data.map(function(item){ 
                              if(!item.billingAddress)
                                return { id: item.id, text:  item.name} 
                              
                              return { 
                                        id: item.id, 
                                text: item.name + ' - ' +item.billingAddress.locality + ' ' +item.billingAddress.postalCode }
                                      }
                            )
                          };
                        },
                        
                   },
                   templateSelection: function (state){

                          console.log(state)
                          if(!state.billingAddress)
                           return state.text;

                          return item.name + ' - ' +item.billingAddress.locality + ' ' +item.billingAddress.postalCode 
                        }
            }
      }
    function select2Users(){
      return {
            allowClear: true,
            placeholder: "----",
                ajax: {
                      url: '/api/users',
                      data: function (params) {
                        var query = {
                          search: params.term,
                        }
                        return query;
                      },
                       processResults: function (data) {
                          // Tranforms the top-level key of the response object from 'items' to 'results'
                          return {
                            results: data.map(function(item){ 
                              if(!item.id)
                                return { id: item.id, text:  item.email} 
                              else
                                return { id: item.id, text: item.email }
                              }
                            )
                          };
                        },
                        
                   },
                   templateSelection: function (state){

                          console.log("state",state)
                          if(!state.id)
                           return state.text;

                          return state.text;
                        }
            }
      }



      function select2Profile(type){
      return {
            allowClear: true,
            placeholder: "----",
                ajax: {
                      url: '/api/profiles?type='+type,
                      data: function (params) {
                        var query = {
                          search: params.term,
                        }
                        return query;
                      },
                       processResults: function (data) {
                          // Tranforms the top-level key of the response object from 'items' to 'results'
                          return {
                            results: data.map(function(item){ 
                              if(!item.id)
                                return { id: item.id, text:  item.firstName +' '+item.lastName}  
                              else
                                return { id: item.id, text: item.firstName + ' ' + item.lastName }
                              }
                            )
                          };
                        },
                        
                   },
                   templateSelection: function (state){

                          console.log("state",state)
                          if(!state.id)
                           return state.text;

                          return  state.text;
                        }
            }
      }





      this.disableProfile= function(){

          $('.disableProfile').on('click', function(){

              var btn = $(this);

              var profile = $(this).attr('profileId');

              
              $.ajax({
                url: "/api/profiles/" + profile +'/disable',
                type: 'DELETE',
                contentType: 'application/json',
                success: function(){
                 M.toast({html:'success',classes:'green'});
                  btn.closest('.enableProfile').show();
                  btn.hide();
               },
                error: function(){ M.toast({html:"Erreur: le profil n'est pas désactiver",classes:'red'});}
              })
          })
      }


  this.enableProfile= function(){

    $('.enableProfile').on('click', function(){

              var btn = $(this);
              console.log(btn.closest('btn'))
              var profile = $(this).attr('profileId');

              
              $.ajax({
                url: "/api/profiles/" + profile + '/enable',
                type: 'DELETE',
                contentType: 'application/json',
                success: function(){
                 M.toast({html:'success',classes:'green'});
                  btn.closest('button').show();
                  btn.hide();
               },
                error: function(){ M.toast({html:"Erreur: le profil n'est pas désactiver",classes:'red'});}
              })
          })
      }
    

   this.initFormMissionFilter =function(){

    
        this.initSelect('#mission_filter_assignedBy',select2Profile('Moderator') );
        this.initSelect('#mission_filter_customer',select2Customers() );
        this.initSelect('#mission_filter_driver',select2Customers() );

   }



   function constraintsFormMission(){

      var preFormId= '#appbundle_mission';



      var $arrivalDate= $(preFormId+'_delivery_arrival_date');
      var $arrivalTime= $(preFormId+'_delivery_arrival_time');
      var $arrivalDate= $(preFormId+'_delivery_arrival_date');
      var $arrivalTime= $(preFormId+'_delivery_arrival_time');
      var $deliveryDate= $(preFormId+'_delivery_removal_date');
      var $deliveryTime= $(preFormId+'_delivery_removal_time');

      function onUpdate(e){
          var arrivalDate = $arrivalDate.val() + ' ' + $arrivalTime.val();
          var deliveryDate =  $deliveryDate.val() + ' ' + $deliveryTime.val();

          console.log(arrivalDate, deliveryDate)

      }
       console.log($arrivalDate, $arrivalTime)
      $arrivalDate.on('change',onUpdate);
      $arrivalTime.on('change',onUpdate);
      $deliveryDate.on('change',onUpdate);
      $deliveryTime.on('change',onUpdate);
      
   }


   

        
       


   this.autocomplete =function ($id,auto){

    var self = {};

      var field= $(document.getElementById($id));
      var idInput= $id+'_autocomplete';
      var data =[];
      var _searchFn;
      var _onSelect;


      var input = $(document.getElementById(idInput));
        
      var $dropdown = $('<ul class="app-autocomplete"></ul>').addClass('collection');

     var selected = $('option:selected', field);
     input.val(selected.text())
    

     var addItem = function (item){
        
       var $li = $('<li  class="collection-item"></li>').text(item.text);
       $dropdown.append($li)

       if (selected && selected.val()==item.id)
        $li.addClass('green')
       $li.on('click',function(){

        
          field.html("");
          var opt= $('<option value="' + item.id+'"  selected="selected"></option>')
          opt.text(item.text);
          field.append(opt)
          input.val(item.text)
          console.log(item.text)
          selected = $('option:selected', field);
          $dropdown.hide();
          if(typeof _onSelect == 'function')
            _onSelect(item, $li);
       });
       
       
      }

      self.reset= function(){
        input.val('');
        field.html('');

      }




      self.setData = function(data, formatItem){
        $dropdown.html('');
        
           data.map(function(item){
                addItem(formatItem(item))
              })
           $dropdown.show();
      }



      self.onSelect=function(fn){
        _onSelect= fn;
      }


     
      
  
      if(auto==true){
         input.on('click', function(e) { 
             
          _searchFn('search');
         })
       }
         else{
            
            input.on('keyup', function(e) {

                  var search =input.val();

                  // Hand tablution event
                  var code = e.keyCode || e.which;
                  if (code === 9)
                     $('.app-autocomplete').hide();
                 
                  if(search.length<3)
                    return;

                  _searchFn(search);
            

            })
         }
      

      
      
     
      self.onSearch= function(searchFn) { _searchFn = searchFn };

      //ul.hide();
      input.after($dropdown);

      return self;
   }


   
  


   //--------------- Search profile
   this.autocompleteProfile =function( $id, type){



        // Format data item
        function formatProfile(profile){
            var item=null;
            if( type != 'Customer'){
              item=  { id: profile.id, text:  profile.firstName + ' ' +profile.lastName} ;
            }else{
              item = { 
                      id: profile.id, 
                text: profile.name + ' ' +profile.billingAddress.locality +' '+profile.billingAddress.postalCode
                    }
            }
            return item;
       }


      var autocomplete= this.autocomplete($id);

      autocomplete.onSearch(function(search){
          $.ajax({
              url: '/api/profiles?type='+type,
              data:{
                  search: search
                },
              success: function(data){
                    autocomplete.setData(data,formatProfile)
              }
           })
        })

        return autocomplete;
   }
    
   this.autocompleteAddress=function($id, customerId){

      var $addresses = $(document.getElementById($id));
      var $customer = $(document.getElementById(customerId));
     


      // Format data item
        function formatItem(address){
            
           
            return address;
       }

       var onSearch=function(search){

           var customerOpt = $('option:selected',$customer);
           var idCustomer= customerOpt.val();
           console.log(idCustomer);
            if(!idCustomer)
            {
              alert('Il faut choisir un client pour la mission'+ idCustomer)
            }

          $.ajax({
              url: '/api/customers/'+idCustomer + '/locations?tostring=true',
              success: function(data){
                    autocomplete.setData(data,formatItem)
              }
           })
        }


      var autocomplete= this.autocomplete($id,true);
        autocomplete.onSearch(onSearch);

        return autocomplete;
    }





   this.initFormMission= function(){

        //auto complete profile
        var autoCustomer =this.autocompleteProfile('appbundle_mission_customer','Customer'  )
        

        this.autocompleteProfile('appbundle_mission_assignedBy','Moderator');
        this.autocompleteProfile('appbundle_mission_driver','Driver');

        // autocomplete address
     var autoRemoval_address =this.autocompleteAddress('appbundle_mission_removal_address','appbundle_mission_customer');
     var autoDelivery_address =this.autocompleteAddress('appbundle_mission_delivery_address','appbundle_mission_customer');

      autoCustomer.onSelect(function () {
        autoRemoval_address.reset();
        autoDelivery_address.reset();
      });

        this.initSelect('#appbundle_mission_status',{});
        this.initSelect('#appbundle_mission_removal_weightUnit',{});
        this.initSelect('#appbundle_mission_delivery_paymentMethod',{});

       
        $('#appbundle_mission_removal_plannedQuantity').mask('0000', {placeholder: "____"});
        $('#appbundle_mission_removal_loadedQuantity').mask('0000', {placeholder: "____"});
        $('#appbundle_mission_removal_weight').mask('0000', {placeholder: "____"});
        

        


       
        constraintsFormMission();
   }



   this.initMask = function(){

     $('.datepicker').mask('00/00/0000', {placeholder: "__/__/____"});
     $('.timepicker').mask('00:00', {placeholder: "__:__"});


     $('.datepicker').on('keyup',function(){
        val= $(this).val();
        $d= this;
        var test = true;
        var p= [
                  /(0[1-9]|1[0-9]|2[0-9]|3[01])/, 
            /(0[1-9]|1[012])/,
            /20[0-9]{2}/
        ];

        parsed= val.split('/');
        
        parsed.map(function(item,i){
          if(!p[i].exec(item ))
            test= false;
              
        })
        if(test == false)
          $d.style.color='red';
        else{
          $d.style.color='black';
        }
        
      })
     $('.timepicker').on('keyup',function(){
        val= $(this).val();
        $d= this;
        var test = true;

        var p= [
                  /(0[0-9]|1[0-9]|2[0-3])/, 
                  /(0[0-9]|([1-5])[0-9])/, 
            
        ];

        parsed= val.split(':');
        parsed.map(function(item,i){
          if(!p[i].exec(item ))
            test= false;
              
        })

        if(test == false)
          $d.style.color='red';
        else{
          $d.style.color='black';
        }
        
      })

     /*
      var pattern= {
              d: {pattern: /(0[1-9]|1[0-9]|2[0-9]|3[01])/},
              m: {pattern: /(0[1-9]|1[012])/},
              y: {pattern: /[0-9]{4}/}
           
          }
     $('.datepicker').mask('d/m/y', {
     // translation:pattern,
      placeholder: "__/__/____"});
     $('.timepicker').mask('00:00', {placeholder: "__:__"});

     */
   }





   this.initLocationCustomer=function(){

      function newLocation(data,path){
          var form=templates.locationForm();
          form.setData(data);
         
          form.submit(function(state,btn){
           
            if(state.formState=='NEW'){
              $.ajax(path, {
              data : JSON.stringify(state.data),
              contentType : 'application/json',
              type : 'POST',
              success:function(data){

                    form.setData(data);
                         M.toast({html:'success',classes:'green'})
                      }
            });  
            } 

            if(state.formState=='EDIT'){

              $.ajax(path+'/'+state.location.id, {
              data : JSON.stringify(state.data),
              contentType : 'application/json',
              type : 'PATCH',
              success:function(){
                          M.toast({html:'success',classes:'green'})
                      }
            });  
            }
            
     

         });

          form.delete(function(state,btn){
           
            
              $.ajax(path+'/'+state.location.id, {
              data : JSON.stringify(state.data),
              contentType : 'application/json',
              type : 'DELETE',
              success:function(){
                          form.remove();
                      }
            });  
            });
            
     

          return form;
      }

      var customerLocations = $('.customerLocations');


      customerLocations.each(function(index){
          item= $(this);

          var path= item.attr('path');
          
          $.get(path)
          .done(function(data){
            data.forEach(function(locationItem,index){
              if(!locationItem.isBillingAddress)
                item.append(newLocation(locationItem, path).render());
            })
          })
      })

      $('.addLocation').on('click',function(event){
          event.preventDefault();

          var $list= $($(this).attr('data-list'));
          var path= $list.attr('path');

          form=newLocation({},path);
          $list.append(form.render());
          
         
        })  
   }

    
  return this;
   
})()