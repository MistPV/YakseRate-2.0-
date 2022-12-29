<?
session_start();
if ($_POST['out']=='Выход') {$_SESSION['login']=''; $_SESSION['pass']='';$_SESSION['status']='';}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Система рейтенгирования студентов ЯКСЭ</title>
    <link rel="shortcut icon" type="image/svg" href="img\logo.svg">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
    <?php
    $host='localhost';
    $name='root';
    $pass='';
    $base='yakserate';

    $conn=mysqli_connect($host,$name,$pass,$base);
    ?>
  <header class="text-white body-font bg-[#2A488D]">
        <div class="container flex flex-wrap flex-col md:flex-row items-center max-w-full">
              <img class="relative" src="img/figure-logo.svg">
              <a href="index.php" class="ml-3 absolute flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img src="img/logo.svg">
                <span class="ml-2 text-xl text-white font-semibold">Система рейтингирования студентов.
                  <br>Якутский колледж связи и энергетики имени П.И. Дудкина</span>
              </a>
              <nav class="md:ml-40 md:mr-auto flex font-bold flex-wrap items-center text-base justify-center">
                <a href="rate.php" class="mr-5 hover:text-[#879ABF] text-xl flex items-center"><img class="mx-1" src="img/rate.svg">Студенты</a>
                <a href="group.php" class="mr-5 hover:text-[#879ABF] text-xl flex items-center"><img class="mx-1" src="img/group.svg">Команды</a>
                <a href="materials.php" class="mr-5 hover:text-[#879ABF] text-xl flex items-center"><img class="mx-1" src="img/materials.svg">Материалы</a>
              </nav>
              <?
              if ($_SESSION['login']!=''){
              $login=$_SESSION['login'];
              $query="SELECT * FROM `users` WHERE `login`='$login'";
          
              $result=mysqli_query($conn,$query);
              while($row=mysqli_fetch_array($result))
              {
              ?>
              <a href="user.php" class="mr-5 font-bold text-[#2A488D] flex items-center bg-[#879ABF] py-1 px-6 focus:outline-none hover:border-4 hover:border-[#7F8EAC] rounded-full text-xl mt-4 md:mt-0">
                <img src="img/<?echo $row[4];?>" class="rounded-full w-8 h-8">
                <p class="pl-3">
                <?$str=$row[1];
                echo '<br><hr>';
                preg_match_all('/ (.)/iu',$str,$m);
                 
                $m2 = explode(' ', $str);
                echo $m2[0] .' '. $m[1][0]. '.' . $m[1][1].'.';
                ?>
                </p>
              </a>
              <a href="#" class="mr-5 font-bold text-[#2A488D] flex items-center focus:outline-none rounded-full text-xl mt-4 md:mt-0" data-modal-toggle="defaultModal">
              <img src="img/notice-a.svg" class="rounded-full hover:border-2 hover:border-[#7F8EAC]">
              </a>
              <form action="index.php" method="post">
                <button class="mr-5 font-bold text-white flex items-center focus:outline-none hover:border-2 hover:border-[#7F8EAC] rounded-full text-sm mt-4 md:mt-0" name="out" value="Выход"> 
                  <img src="img/exit.svg">
                </button>  
              </form>
              <?
                }
              }
              else{
              ?>
              <a href="auto.php" class="mr-10 font-bold text-[#2A488D] flex items-center bg-[#879ABF] py-2 px-6 focus:outline-none hover:border-4 hover:border-[#7F8EAC] rounded-full text-xl mt-4 md:mt-0">
                <svg class="mx-1" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M13 26C5.8203 26 0 20.1797 0 13C0 5.8203 5.8203 0 13 0C20.1797 0 26 5.8203 26 13C26 20.1797 20.1797 26 13 26ZM21.7449 19.0563C22.9374 17.3376 23.6364 15.2504 23.6364 13C23.6364 7.1257 18.8743 2.36364 13 2.36364C7.1257 2.36364 2.36364 7.1257 2.36364 13C2.36364 15.2504 3.06254 17.3376 4.25514 19.0563C5.58521 17.2996 8.71071 16.5455 13 16.5455C17.2893 16.5455 20.4147 17.2996 21.7449 19.0563ZM20.0492 20.9652C19.7033 19.7215 17.2184 18.9091 13 18.9091C8.78164 18.9091 6.29673 19.7215 5.95083 20.9652C7.82754 22.6273 10.2959 23.6364 13 23.6364C15.7041 23.6364 18.1725 22.6273 20.0492 20.9652ZM13 16.5455C10.3537 16.5455 8.27273 14.6869 8.27273 10.6364C8.27273 7.98408 10.1389 5.90909 13 5.90909C15.8531 5.90909 17.7273 8.18005 17.7273 10.8727C17.7273 14.7486 15.6214 16.5455 13 16.5455ZM10.6364 10.6364C10.6364 13.3183 11.6033 14.1818 13 14.1818C14.3918 14.1818 15.3636 13.3527 15.3636 10.8727C15.3636 9.39595 14.4367 8.27273 13 8.27273C11.5035 8.27273 10.6364 9.23688 10.6364 10.6364Z" fill="#2A488D"/>
                </svg>
                Вход
              </a>
              <?
              }
              ?>
        </div>
  </header>
  <main>
    <!-- Слайдер-->
    <div id="default-carousel" class="mt-5 mx-20 relative" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="overflow-hidden relative h-96 rounded-lg 2xl:h-96 2xl:h-96">
                 <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/slide2.png" class="block absolute top-1/2 left-1/2 w-auto -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/slide3.png" class="block absolute top-1/2 left-1/2 w-auto -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/slide1.png" class="block absolute top-1/2 left-1/2 w-auto -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
    </div>
    <!-- информация -->
    <div class="container mt-10 mx-20 relative">
          <!-- информация текст -->
          <span class="font-bold text-5xl text-white text-center mt-5 px-40 container mt-5">
          Система рейтингирования студентов
          </span>  
          <span class="text-4xl text-white text-center mt-5 px-40 container mt-5">
          Краткая информация
          </span>
           <!-- информация наполнение -->
          <div class="rate-info">
                <div class="grid grid-cols-2 gap-2 p-20 text-xl">
                      <div class="flex items-center space-x-4 p-10">
                          <img class="w-20 h-20 rounded-full" src="img/info.svg" alt="">
                          <div class="space-y-2 font-bold text-white">
                              <div class="text-4xl">Для чего это нужно ?</div>
                              <div class="font-medium text-white break-words">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </div>
                          </div>
                      </div>
                      <div class="flex items-center space-x-4 p-10">
                          <img class="w-20 h-20 rounded-full" src="img/info.svg" alt="">
                          <div class="space-y-2 font-bold text-white">
                              <div class="text-4xl">Как подать заявку ?</div>
                              <div class="font-medium text-white break-words">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </div>
                          </div>
                      </div>
                      <div class="flex items-center space-x-4 p-10">
                          <img class="w-20 h-20 rounded-full" src="img/info.svg" alt="">
                          <div class="space-y-2 font-bold text-white">
                              <div class="text-4xl">Как получить доступ ?</div>
                              <div class="font-medium text-white break-words">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </div>
                          </div>
                      </div>
                      <div class="flex items-center space-x-4 p-10">
                          <img class="w-20 h-20 rounded-full" src="img/info.svg" alt="">
                          <div class="space-y-2 font-bold text-white">
                              <div class="text-3xl">Как работает система рейтинга ?</div>
                              <div class="font-medium text-white break-words">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </div>
                          </div>
                      </div>        
                </div>    
          </div>
    </div>
    <!-- Навигация -->
    <div class="container mt-10 mx-20 relative">
          <!-- информация текст -->
            <span class="font-bold text-5xl text-white text-center px-40 container">
            Перейти к:
            </span>  
          <div class="nav-low">
                <div class="grid grid-cols-2 gap-2 p-20 text-xl">
                      <a href="rate.php" class=" p-20 mt-5 ml-5 bg-[#5A72A6] rounded-xl hover:bg-gray-400 shadow-lg flex items-center">
                            <img class="mx-1" src="img/rate-dark.svg">
                            <span class="text-4xl font-bold text-white">
                              Рейтингу
                            </span>
                      </a>
                      <a href="user.php" class=" p-20 mt-5 ml-5 bg-[#5A72A6] rounded-xl hover:bg-gray-400 shadow-lg flex items-center" >
                            <img class="mx-1" src="img/user-dark.svg">
                            <span class="text-4xl font-bold text-white">
                              Профилю
                            </span>
                      </a>
                      <a href="#" class=" p-20 mt-5 ml-5 bg-[#5A72A6] rounded-xl hover:bg-gray-400 shadow-lg flex items-center" data-modal-toggle="defaultModal">
                            <img class="mx-1" src="img/materials-dark.svg">
                            <span class="text-4xl font-bold text-white">
                              Материалам
                            </span>
                      </a>
                      <a href="#" class="p-20 mt-5 ml-5 bg-[#5A72A6] rounded-xl hover:bg-gray-400 shadow-lg flex items-center" data-modal-toggle="defaultModal">
                            <img class="mx-1" src="img/group-dark.svg">
                            <span class="text-4xl font-bold text-white">
                              Командам
                            </span>
                      </a>
                </div>
          </div>
          <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
          <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
              <!-- Модульное окно -->
              <div class="relative bg-white rounded-lg shadow">
                  <!-- Модульное окно-->
                  <div class="flex justify-between items-start p-4 rounded-t border-b">
                      <h3 class="text-xl font-semibold text-gray-900 ">
                          Ошибка
                      </h3>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="defaultModal">
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                      </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-6 space-y-6">
                      <p class="text-base leading-relaxed text-black ">
                          Здравствуйте, мы сожелеем такой страницы пока не существует. 
                      </p>
                      <p class="text-base leading-relaxed text-black ">
                          Дождитсь разработчика пока он не обновит сайт, скоро страница станет доступной.
                      </p>
                  </div>
                  <!-- Modal footer -->
                  <div class="flex items-center p-6 space-x-2 rounded-b border-t ">
                      <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Хорошо</button>
                      <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Закрыть</button>
                  </div>
              </div>
          </div>
      </div>      
    </div>
  </main>
  <footer class="footer items-center p-6 mt-10 text-white"  style="background-image: url(img/figure-footer.svg)">
      <div class="items-center pl-20 grid-flow-col font-bold text-xl">
        <p>Государственное автономное профессиональное<br>
        образовательное учреждение Республики Саха (Якутия)<br>
        «Якутский колледж связи и энергетики имени П.И. Дудкина»
        </p>
      </div>
      <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end"> 
        <a href="https://vk.com/yakse?from=quick_search" class="rounded-xl hover:border-2 hover:border-gray-500"><img class="h-10 " src="img/vk.svg"></a>
        <a href="https://t.me/yakse14" class="rounded-xl hover:border-2 hover:border-gray-500"><img class="h-10" src="img/telegram.svg"></a>
      </div> 
      <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end"> 
        <p class="font-medium text-xl">
          ГАПОУ РС (Я) «ЯКСЭ имени П.И.Дудкина»<br>
          г. Якутск ул. Петра Алексеева 25<br>
          тел: 8 (4112) 42-25-06<br>
          yaktsit@mail.ru<br>
        </p>
      </div>
 </footer>
</body>
</html>