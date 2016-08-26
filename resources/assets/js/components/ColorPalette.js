
Vue.component('ColorPalette',{
  props: ['colors'],
    data: function(){
      return {
        user : '',
        moodboard : '',
        category : '',
        palette : {
          detail: '',
          color: []
        }
      }
    },
  ready(){
     this.getSettings();
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
  }
});
