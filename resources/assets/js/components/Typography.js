
Vue.component('Typography',{
  props: ['types'],
    data: function(){
      return {
        googleFonts: [],
        font : '',
        selectedfont: [],
        user : '',
        moodboard : '',
        category : 'test',
        type : {
          detail: '',
          color: []
        }
      }
    },
  ready(){
     this.getGoogleFfonts();
  },
  methods:{
    getEmptyColorSection: function(){
      return {
            sectionsName: 'Default Color',

                  child: [

                  ] }
    },
    getEmptyColor: function(){
      return
         {
           name: '#000'
         }

    },
    loadfont: function(font){
    //  console.log(font);
      this.selectedfont.push(font);
    },
    getGoogleFfonts : function(){
      this.$http.get('https://www.googleapis.com/webfonts/v1/webfonts?fields=items%2Ffamily&key=AIzaSyBzVRj-TIf1bdKYLfyU9-QcsL6coWRDY5s').then((response)=>{
      //  console.log(response['data']['items']);
        this.$set('googleFonts', response['data']['items']);
      },(response)=>{
        concole.log(response);
      });
    },

    addEmptyColorSection: function(){
      this.palette.color.push(this.getEmptyColorSection());
    },

    AddColorToSection: function(section){
      section.child.push({name: '#000'});
    },
    savePalette: function(){
        this.$http.put('/user/' + this.user + '/moodboard/' + this.moodboard + '/category/'+ this.category,this.palette).then((response)=>{

      },(response)=>{
        console.log(response);
      });
    },

    getSettings: function(){
      this.$http.get('/user/' + this.user + '/moodboard/' + this.moodboard + '/category/'+ this.category,this.palette).then((response)=>{

        if(response['data']){
          this.$set('palette',response['data']);
        }
      },(response)=>{
        console.log(response);
      });
    }
  },
  
});
