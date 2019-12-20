<template>
        <div class="create-post-page">
                    <section id="page-title-area" class="section-padding overlay">
      <div class="container">
        <div class="row">
          <!-- Page Title Start -->
          <div class="col-lg-12">
            <div class="section-title  text-center">
              <h2>Добавить авто</h2>
              <span class="title-line"><i class="fa fa-car"></i></span>
              <p>Заполните все поля формы</p>
            </div>
          </div>
          <!-- Page Title End -->
        </div>
      </div>
    </section>
            <div class="panel-form">
                <div class="panel-body">
                
                    <label for="brand">Марка автомобиля</label>
                    <input type="text" id="brand" v-model="form.brand" placeholder="Tab для переключения по форме">

                    <label for="model">Модель автомобиля</label>
                    <input type="text" id="model" v-model="form.model" placeholder="Например, Aventador">

                    <label for="releaseDate">Год выпуска</label>
                    <input type="number"  id="releaseDate" v-model="form.releaseDate" placeholder="Именно этого авто">

                    <label for="power">Заявленная мощность</label>
                    <input type="text"  id="power" v-model="form.power" placeholder="в л.с">

                    <label for="cost">Цена за сутки</label>
                    <input type="text"  id="cost" v-model="form.cost" placeholder="стоимость в USD">

                    <label for="cost">Номер для связи</label>
                    <input type=""  id="" v-model="form.phoneNumber" placeholder="Ваш телефон">

                    <label for="descripton">Описание</label>
                    <textarea type="text"  id="descripton" v-model="form.descripton"></textarea>

                    <label for="photo">Фото автомобиля</label>
                    <button class="form-btn" @click='onButtonClick'>Выберите фото</button>
                    <input class="d-none" type="file" name="file" id="photo" ref='exclusive' @change="onFileChange">
                    <input type="text" v-if="readyToUpload" name="" id="file-name" v-model="form.displayFileName" readonly>
                    <div v-if="readyToUpload">
                        <img :src='form.photo' alt="картинка" class="post-img">
                    </div>
                    <button class="form-btn" v-if="readyToUpload" @click="CreatePost">Добавить авто</button>
                
            </div>
            </div>
            <div class="container">
            <ul>
                <li v-for="item in items" :key='item.id' >
                    <p>{{item.brand}}</p>
                    <p>{{item.model}}</p>
                    <p>{{item.power}} л.с</p>
                    <p>{{item.releaseDate}}года</p>
                    <p>{{item.cost}} р. в сутки</p>
                    <p>Номер для связи : {{item.phoneNumber}} </p>
                    <p>Описание{{item.description}}</p>
                    <p>{{item.updated_at}}</p>
                    
                    <img :src='getPath(item)' height="200px">
                    <button @click="onDelete(item)" v-if="app.user">Delete</button> 
                </li>
            </ul>
            </div>
        </div>
        
        
    

</template>
<style scoped>
    .create-post-car{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    label{
        color:#333;
        margin-top: 10px;
        font-family: 'Open Sans', sans-serif;
    }
    input{
        width: 500px;
        height: 40px;
        border: 1px solid #333;
        border-radius: 5px;
        color: #333

    }
    .panel-body{
        display: flex;
        flex-direction: column;
    }
    .d-none{
        display: none;
    }
    .post-img{
        width:500px;
    }
    #file-name{
        background-color: transparent;
        border:none;
        color:#333;
        margin-top:10px;
    }
</style>

<script>
export default {
    computed:{
        readyToUpload(){
            return this.form.displayFileName && this.form.photo;
        }
    },
    props: ['app'],
    data(){
        return{

            active: null,
            form: new Form(
                {
                brand : null,
                model : null,
                releaseDate  : null,
                power : null,
                cost : null,
                phoneNumber : null, 
                descripton : null,
                displayFileName : null,
                uploadFileData : null,
                photo: null,
            }
            ),
            items: []
            
        }
    },
    methods:{
                onFileChange( event ){
                    let file = event.target.files[0];
                    this.form.displayFileName = event.target.files[0].name;
                    let reader = new FileReader();
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result;
                        
                    }
                    reader.readAsDataURL(file);

                },
                onButtonClick(){
                    this.$refs.exclusive.click();
                },
                CreatePost(){
                    this.form.post('/createpost')
                    .then( response => {
                        this.form = {
                        brand : null,
                        model : null,
                        releaseDate  : null,
                        power : null,
                        cost : null,
                        phoneNumber : null, 
                        descripton : null,
                        displayFileName : null,
                        uploadFileData : null,
                        photo: null,
                        }
                        this.loadlist() 
                    })
                    
                },
                loadlist(){
                    axios.post('/getlist')
                        .then(response =>{
                            this.items = response.data
                        })
                },
                getPath( item ){
                    return '/images/'+item.photo;
                },
                onDelete( item ){
                    axios.post('/delete/'+item.id)
                        .then(response =>{
                            let id = this.items.findIndex(file=>{
                                return file.id === item.id
                            });
                            if(id>-1){
                                this.items.splice(id,1);
                            }
                        })
                }

            },
    created(){
        this.loadlist()        
    }    

}
</script>
