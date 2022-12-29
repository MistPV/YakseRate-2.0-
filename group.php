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
      <div class="container mx-60 relative mt-20">
        <span class="font-bold text-4xl text-white text-center px-40 container">
            Рейтинг
        </span> 
        <span class="font-medium text-2xl text-[#2A488D] text-center ml-[42.5rem] container">
          Команды
        </span>
      </div>
      <div class="container mx-60 pl-[7.5rem] mt-10">
        <div class="sm:hidden">
              <label for="tabs" class="sr-only"></label>
              <select id="tabs" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              </select>
          </div>
          <p class=" mx-10 text-white">Cортировка по:</p>
          <ul class="mx-10 hidden w-200 text-sm font-medium text-center text-gray-500 rounded-lg sm:flex">
              <li class="w-50">
                  <a href="#" class="inline-block px-6 py-1 w-full text-white bg-[#2A488D] rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none text-white" aria-current="page">Оценке</a>
              </li>
              <li class="w-50">
                  <a href="#" class="inline-block px-6 py-1 w-full bg-[#5A72A6] hover:bg-[#2A488D] focus:ring-4 focus:ring-blue-300 focus:outline-none text-white">Алфавиту</a>
              </li>
              <li class="w-50">
                  <a href="#" class="inline-block px-6 py-1 w-full bg-[#5A72A6] rounded-r-lg hover:bg-[#2A488D] focus:ring-4 focus:ring-blue-300 focus:outline-none text-white">Группе</a>
              </li>
               <form class="pl-40 ml-80">   
                <label class="mb-1 text-sm font-medium sr-only"></label>
                <div class="relative">
                  <form action='group.php' method='post'>
                    <input type="text" name='search_text' class="block p-1 pl-5 w-80 text-sm text-white bg-[#5A72A6] rounded-lg placeholder-[#2A488D] placeholder-opacity-75" placeholder="Название команды" required>
                    <button name='search' value='Поиск' class="text-white absolute right-1.5 bottom-0.5 bg-[#5A72A6] hover:bg-[#2A488D] border-[#2A488D] border-2 font-medium rounded-lg text-sm px-1 py-1"><img src="img/search.svg" class="h-3 w-3"></button>
                  </form>
                </div>
               </form> 
            </ul>
      </div>
      <div class="container mx-[25rem] w-max relative overflow-x-auto sm:rounded-3xl mt-5">
        <table class="text-sm text-left text-white">
              <?
              $query="SELECT * FROM `comand` ORDER BY score DESC";
              $i = 1; 
              $result=mysqli_query($conn,$query);

              while($row=mysqli_fetch_array($result))
              { 
              ?>
            <thead class="text-xs text-white bg-[#5A72A6] rounded-lg">
                <tr>
                    <th scope="col" class="text-2xl pl-20 py-3">
                      <?echo $i++?>
                    </th>
                    <th scope="col" class="px-20 py-3">
                        <img class="rounded-full h-20 w-20" src="img/<?echo $row[2];?>">
                    </th>
                    <th scope="col" class="px-20 text-2xl py-3">
                        <? echo $row[1];?>
                    </th>
                    <th scope="col" class="text-2xl px-20 py-3 uppercase">
                        <? echo $row[3];?>
                        <p class="px-10 text-xs text-[#2A488D]">группа</p>
                    </th>
                    <th scope="col" class="text-2xl px-20 py-3">
                        <? echo $row[4];?>
                        <p class="text-xs text-[#2A488D]">оценка</p>
                    </th>
                </tr>
            </thead>
            <?
            }
            ?>
        </table>
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