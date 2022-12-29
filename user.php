<?
session_start();
if ($_POST['out']=='Выход') {$_SESSION['login']=''; $_SESSION['pass']='';$_SESSION['status']='';}
if ($_SESSION['status'] == '') {
  echo "<script>alert('Вы вошли в аккаунт!');
  location.href='http://rating-yakse.ru/index.php';
  </script>";
}
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
                  <a href="#" class="mr-5 font-bold text-[#2A488D] flex items-center focus:outline-none rounded-full text-xl mt-4 md:mt-0">
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
      <?
      if($_SESSION['login']!='')
      {
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_array($result);
      ?>
      <div class="container mt-10 mx-20 relative">
                <p class="flex font-bold text-5xl text-white text-center mt-5 px-40 container mt-5">
                  Личный кабинет
                    <a href="settings.php" class="pl-5"><img src="img/settings.svg" class="hover:border-2 hover:border-[#5A72A6] rounded-full mt-2 h-10 w-10"></a>
                </p>
                <div class="container mt-10 mx-40 flex">
                  <div class="rounded-2xl pt-10 pl-20 w-96 bg-gradient-to-t from-[#2F4C90]">
                      <img src="img/<?echo($row[4])?>" class="h-60 border-4 border-[#2A488D] rounded-full">
                      <p class=" text-white text-center font-bold text-2xl mt-5 pr-[4rem]"><? echo $row[1] ?></p>
                      <p class="text-white text-xl font-bold text-center mt-5 pr-[4rem] pb-10">Группа: <? echo $row[5] ?></p>
                  </div>
                  <div>         
                    <table class="text-left text-white h-20 ml-10">
                          <thead class="flex text-white bg-[#2A488D] rounded-xl">
                                <tr class="grid grid-cols-3">
                                      <th scope="col" class="px-8 text-2xl py-3 flex items-center space-x-4">
                                          <img src="img/user-rating.svg" class="h-[4rem] ">
                                        <div class="space-y-1 font-bold">
                                            <div><? echo $row[6];?></div>
                                            <div class="text-xs text-[#B6CFFF] font-bold ">Оценка</div>
                                        </div>
                                      </th>
                                      <th scope="col" class="px-8 text-2xl py-3 flex items-center space-x-4">
                                          <img src="img/profile-achiv.svg" class="h-[4rem] ">
                                        <div class="space-y-1 font-bold">
                                            <div><? echo $row[9];?></div>
                                            <div class="text-xs text-[#B6CFFF] font-bold ">Достижений получено</div>
                                        </div>
                                      </th>
                                      <th scope="col" class="px-8 text-2xl py-3 flex items-center space-x-4">
                                          <img src="img/profile-group.svg" class="h-[4rem] ">
                                        <div class="space-y-1 font-bold">
                                            <div>Недоступно</div>
                                            <div class="text-xs text-[#B6CFFF] font-bold ">Участник команды</div>
                                        </div>
                                      </th>
                                </tr>
                          </thead>
                    </table>
                      <div class="flex h-20 ml-10 mt-5 py-[11rem] text-white bg-[#2A488D] rounded-xl">
                        <?
                        if ($row[7] == 1){
                        ?>
                        <div class="px-8 text-2xl flex items-center space-x-4">
                                  <img src="img/profile-grant.svg" class="h-[4rem] ">
                              <div class="space-y-1 font-bold ">
                                  <div>Панель администратора</div>
                                  <a href="#" class="bg-[#879ABF] hover:bg-[#B6CFFF] px-5 py-2 rounded-xl text-white text-xl">Вход</a>
                              </div>
                          </div>
                        <?
                        }
                        else
                        {
                        ?> 
                         <div class="px-8 text-2xl flex items-center space-x-4">
                                  <img src="img/profile-grant.svg" class="h-[4rem] ">
                              <div class="space-y-1 font-bold ">
                                  <div>Получить стипендию</div>
                                  <div class="text-xl text-whire font-medium break-words">Чтобы получить возможность подать<br> заявку на стипендию необходимо иметь<br> оценку 8 и более.</div>
                                  <a href="grant.php" class="bg-[#879ABF] hover:bg-[#B6CFFF] px-5 py-2 rounded-xl text-white text-xl">Далее</a>
                              </div>
                          </div>
                        <?
                        }
                        ?>  
                      </div>
                  </div> 
                </div>
        </div>
        <?
        }
        ?>
        <div class="container mt-10 mx-20 relative">
                <p class="flex font-bold text-5xl text-white text-center mt-5 px-40 container mt-5">
                  Документация
                    <a href="settings.php" class="pl-5"><img src="img/settings.svg" class="hover:border-2 hover:border-[#5A72A6] rounded-full mt-2 h-10 w-10"></a>
                </p>
                <div class="container mt-10 mx-40 flex ">
                  <div class="grid grid-cols-3 rounded-2xl p-20 bg-[#2F4C90] flex">
                    <img src="img/sertif.png" class="w-[21.5rem] m-5">
                    <img src="img/sertif.png" class="w-[21.5rem] m-5">
                    <img src="img/sertif.png" class="w-[21.5rem] m-5">
                    <img src="img/sertif.png" class="w-[21.5rem] m-5">
                    <img src="img/sertif.png" class="w-[21.5rem] m-5">
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