<template>
  <div class="home">
    <!--== Slider Area Start ==-->
    <section id="slider-area">
      <!--== slide Item One ==-->
      <div class="single-slide-item overlay">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">


                  <!--== Car Choose ==-->
                  <!-- <div class="choose-car-type book-item">
                    <h4>CHOOSE CAR TYPE:</h4>
                    <select class="custom-select">
                      <option selected>Select</option>
                      <option value="1">BMW</option>
                      <option value="2">Audi</option>
                      <option value="3">Lexus</option>
                    </select>
                  </div> -->


            </div>

            <div class="col-lg-7 text-right">
              <div class="display-table">
                <div class="display-table-cell">
                  <div class="slider-right-text">
                    <h1>ЗАКАЖИТЕ РАБОЧЕЕ МЕСТО СЕГОДНЯ!</h1>
                    <p>
                      СКИДКА 
                      ДЛЯ НАШИХ ПОСТОЯННЫХ КЛИЕНТОВ
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== slide Item One ==-->
    </section>
    <!--== Slider Area End ==-->

    <!--== Choose Car Area Start ==-->
    <section id="choose-car" class="section-padding">
      <div class="container">
        <div class="row">
          <!-- Section Title Start -->
          <div class="col-lg-12">
            <div class="section-title  text-center">
              <h2>Выберите нужное вам место</h2>
              <span class="title-line"><i class="fa fa-car"></i></span>
              <p>В будущем тут появится фильтр...</p>
            </div>
          </div>
          <!-- Section Title End -->
        </div>

        <div class="row popular-car-gird">
                      <!-- Single Popular Car Start -->

                      <div class="col-lg-4 col-md-6 con suv mpv" v-for="item in items" :key='item.id'>
                        <div class="single-popular-car">
                          <div class="p-car-thumbnails" @mouseenter="item.bookhov = true" @mouseleave="item.bookhov = false">
                              <img
                                :src='getPath(item)'
                                alt="JSOFT"
                                
                              />
                          <div class="on-hover" v-if="item.bookhov && app.user">
                            <button v-if="item.bookhov && !item.booked" @click="rent(item)">Забронировать</button>
                            <p v-if="item.bookhov && item.booked">Забронировано!</p>
                            <button v-if="item.bookhov && item.booked" @click="unrent(item)">Отменить бронь</button>
                          </div>
                          </div>
                          
                          <div class="p-car-content">
                            <h3>
                              <a href="#">{{item.brand}} {{item.model}}</a>
                              <span class="price"
                                ><i class="fa fa-tag"></i>{{item.cost}}$</span
                              >
                            </h3>
                            <h5  >{{item.model}}</h5>
                            <p>Номер для связи : {{item.phoneNumber}} </p>
                            <p>Описание:{{item.descripton}}</p>

                            
                            

                            <div class="p-car-feature">
                              <a href="#">{{item.releaseDate}} года</a>
                              <a href="#">{{item.power}} л.с</a>
                              <a href="#">AIR CONDITION</a>
                            </div>
                            <div class="a-right"><button v-if="app.user"  @click="onDelete(item)" class="delete-car">Удалить место</button> </div>
                            
                          </div>
                        </div>
                      </div>
                      <!-- Single Popular Car End -->
        </div>
      </div>
    </section>
    <!--== Choose Car Area End ==-->

    <!--== Pricing Area Start ==-->
    

    <!--== Testimonials Area Start ==-->
    <section id="testimonial-area" class="section-padding">
      <div class="container">
        <div class="row">
          <!-- Section Title Start -->
          <div class="col-lg-12">
            <div class="section-title  text-center">
              <h2>Наши отзывы</h2>
              <span class="title-line"><i class="fa fa-car"></i></span>
              <p>Уже 3 клиентов с нами!</p>
            </div>
          </div>
          <!-- Section Title End -->
        </div>

        <div class="row">
          <div class="col-lg-8 col-md-12 m-auto">
            <div class="testimonial-content">
              <!--== Single Testimoial Start ==-->
              <div class="single-testimonial">
                <p>
                  Самый лучший сервис аренды коворкинга на русском!
                  Лично знаю разработчика,этот человек знает,что делает!
                  Сейчас организуем трафик на сайт,и дела пойдут в гору
                  Моя оценка 10 из 10 пересдач
                </p>
                <h3>Vidus Ignat, SMM manager</h3>
                <div class="client-logo">
                  <img
                    src="../assets/img/client/i3.jpg"
                    alt="JSOFT"
                  />
                </div>
              </div>
              <!--== Single Testimoial End ==-->

              <!--== Single Testimoial Start ==-->
              <div class="single-testimonial">
                <p>
                  Cервис наверняка понравится многим,у него большое будущее!
                  Разработан на Vue.js + Laravel + MySql.
                  Было потрачено много нервов и сил на борьбу с php.






                </p>
                <h3>Korsak Nikita, Web-developer</h3>
                <div class="client-logo">
                  <img
                    src="../assets/img/client/n2.jpg"
                    alt="JSOFT"
                  />
                </div>
              </div>
              <!--== Single Testimoial End ==-->

              <!--== Single Testimoial Start ==-->
              <div class="single-testimonial">
                <p>
                  Очень крутой дизайн и оформление сайта,говорю как специалист в сфере дизайна,радует,что приложение работает и на телефоне,
                  очень достойный курсовой,осталось только не попасть в армию...
                </p>
                <h3>Artem Ezapenko,  Web-designer</h3>
                <div class="client-logo">
                  <img
                    src="../assets/img/client/t2.jpg"
                    alt="JSOFT"
                  />
                </div>
              </div>
              <!--== Single Testimoial End ==-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== Testimonials Area End ==-->

    

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
      <img src="../assets/img/scroll-top.png" alt="JSOFT" />
    </div>
    <!--== Scroll Top Area End ==-->
  </div>
</template>

<script>
export default {
  name: "home",
  props: ['app'],
  data(){
        return{
            items: [],
        }
    },
  methods: {
  loadlist(){
      axios.post('/getlist')
          .then(response =>{
              this.items = response.data
          })
  },
  getPath( item ){
      return '/images/'+item.photo;
  },
  rent( item ){
      axios.post('/rent/'+item.id)
          .then(response =>{
              this.loadlist();
          })
  },
  unrent( item ){
      axios.post('/unrent/'+item.id)
          .then(response =>{
              this.loadlist();
          })
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
};
</script>
