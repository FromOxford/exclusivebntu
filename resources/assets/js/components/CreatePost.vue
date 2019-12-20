<template>
    <div class="container">
        <div class="create-post-page">
            <div class="container">
                <form action="">
                    <h1>Добавить новое авто</h1>
                    <label for="brand">Марка автомобиля</label>
                    <input type="text" name="title" id="brand" v-model="brand" placeholder="">

                    <label for="model">Модель автомобиля</label> 
                    <input type="text" name="title" id="model" v-model="model">

                    <label for="releaseDate">Год выпуска</label>
                    <input type="date" name="title" id="releaseDate" v-model="releaseDate">

                    <label for="power">Заявленная мощность</label>
                    <input type="text" name="title" id="power" v-model="power">

                    <label for="cost">Цена за сутки</label>
                    <input type="text" name="title" id="cost" v-model="cost">

                    <label for="cost">Номер для связи</label>
                    <input type="number" name="title" id="" v-model="phoneNumber">

                    <label for="descripton">Описание</label>
                    <textarea type="text" name="title" id="descripton" v-model="descripton"></textarea>

                    <label for="photo">Фото автомобиля</label>
                    <button class='btn' @click='onButtonClick'>Выберите фото</button>
                    <input type="file" name="file" id="photo" ref='exclusive' @change="onFileChange">
                    <input type="text" name="" id="" v-model="formData.displayFileName" readonly>
                    <input type="number" name="title" id="" v-model="phoneNumber">
                    <div v-if="readyToUpload">
                        <img :src='formData.uploadFileData' alt="картинка" class="post-img">
                    </div>
                    <button v-if="readyToUpload" @click="uploadImage">Добавить авто</button>

                </form>
            </div>
        </div>
        
        <div class="container">
            <ul>
                <li v-for="item in items" :key='item.id' >
                    <p>{{item.name}}</p>
                    <img :src='getPath(item)' height="200px">
                    <button @click="onDelete(item)">Delete</button> 
                </li>
            </ul>
        </div>
    </div>
    

</template>
<style scoped>
    label{
        color:#fff;
        margin-top: 10px;
        font-family: 'Open Sans', sans-serif;
    }
</style>

<script>
export default {
    computed:{
        readyToUpload(){
            return this.formData.displayFileName && this.formData.uploadFileData;
        }
    },
    data(){
        return{
            active: null,
            tabs: [
                {path: '/',title:'Home'},
                {path: '/upload_file',title:'file_upload'},
                {path: '/browse_file',title:'browse_files'}
            ],
            formData:{
                displayFileName : null,
                uploadFileData : null,
                file: null,
            },
            items: []
            
        }
    },
    methods:{
                onFileChange( event ){
                    let file = event.target.files[0];
                    this.formData.file = file
                    this.formData.displayFileName = event.target.files[0].name;
                    let reader = new FileReader();
                    reader.onload = e => {
                        this.formData.uploadFileData = e.target.result;
                    }
                    reader.readAsDataURL(file);

                },
                onButtonClick(){
                    this.$refs.exclusive.click();
                },
                uploadImage(){
                    let data = new FormData()
                    data.append('exclusive',this.formData.file);
                    axios.post('/', data)
                    .then( response => {
                        this.formData = {
                        displayFileName : null,
                        uploadFileData : null,
                        file: null,
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
                    return '/images/'+item.name;
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
<style scoped>
    .post-img{
        width:500px;
    }
</style>