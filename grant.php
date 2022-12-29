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
          if ($_POST['granted']=='Отправить')
        {
          echo"<h1>Отправлено</h1>";
        }
        ?>
      <div class="container mt-10 mx-20 relative">
          <span class="font-bold text-3xl text-white text-center mt-5 px-40 container mt-5">
            Подача заявки на стипендию
          </span>
          <div class="rounded-2xl mx-40 px-10 pt-20 pb-40 mt-5 bg-[#2F4C90]">
                  <span class="font-medium text-2xl text-white text-center">
                    Проверить возможность:
                  </span>
                <input type="text" class="block mt-5 p-5 pl-5 w-auto text-sm text-white bg-[#5A72A6] rounded-lg placeholder-[#2A488D] placeholder-opacity-75" placeholder="<?echo $row[5]?>" readonly>
                <input type="text" class="block mt-2 p-5 pl-5 w-96 text-sm text-white bg-[#5A72A6] rounded-lg placeholder-[#2A488D] placeholder-opacity-75" placeholder="<?echo $row[1]?>" readonly>
                <?
                if($row[6] >= 8){
                ?>
                <p class="font-medium text-2xl text-white mt-5">
                    Вы <span class="text-[#39D66F]">можете</span>  подать заявку
                </p>
                <div class="w-[50rem] mt-5">
                    <div class="relative group w-full h-40 flex justify-center items-center">
                          <div class="absolute inset-0 w-full h-full rounded-xl bg-[#879ABF] bg-opacity-80  backdrop-blur-xl group-hover:border-4 border-[#879ABF] duration-700"></div>
                          <input accept=".jpg, .jpeg .png, .svg, .webp" class="relative z-10 opacity-0 h-full w-full cursor-pointer" type="file" name="files" value="" >
                          <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full m-auto items-center justify-center">
                              <div class="space-y-6">
                                  <p class="text-[#2A488D] text-lg pt-5 pl-5"><span class="font-bold">Ваши заслуги</span> <br> (Прикрепите все ваши дипломы, грамоты, сертификаты) 
                                    <label title="Загрузить файлы" class="cursor-pointer block">
                                      <img src="img/upload.svg" class="h-10">
                                    </label> 
                                  </p>
                              </div>
                          </div>
                      </div>
                </div>
                <form action="grant.php" method="post">
                  <input type="submit" name="granted" value="Отправить" class="absolute mt-5 bg-[#879ABF] hover:bg-[#B6CFFF] px-5 py-2 rounded-xl text-white text-xl cursor-pointer">
                </form>
                <?
                }
                else{
                ?>
                 <p class="font-medium text-2xl text-white mt-5">
                    Вы <span class="text-[#FF0000]">не можете</span>  подать заявку
                </p>
                <p class="text-xl text-white mt-2">Мы сожалеем, но у вас низкая оценка,<br> повторите чуть позже когда наберете нужную оценку.</p>
                <a href="user.php" class="absolute mt-5 bg-[#879ABF] hover:bg-[#B6CFFF] px-5 py-2 rounded-xl text-white text-xl">Выйти</a>
                <?
                }
                ?> 
          </div>       
      </div>
        <?
        }
        ?> 
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