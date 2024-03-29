<?php $this->extends('layout') ?>

<?php $this->block('content') ?>
<div class="flex justify-center grow bg-no-repeat bg-contain bg-[length:100%_100%]"
     style="background-image: url(<?= asset('img/header.jpg') ?>)">
    <div class="flex justify-center mx-auto text-white">
        <div class="flex flex-col mr-5 my-auto">
            <h1 class="text-6xl font-bold mb-5">MKY Framework</h1>
            <h2 class="text-4xl italic">Framework PHP MVC</h2>
            <h2 class="text-3xl italic">and HMVC</h2>
            <h3 class="text-xl italic">
                to see documentation
                <a class="bg-blue-800 hover:bg-blue-500 text-white font-bold py-1 px-2 rounded" href="https://micky-n.github.io/mky" target="_blank">click here !</a>
            </h3>
        </div>
        <div class="my-auto">
            <img class="w-96" src="assets/img/mky.png">
        </div>
    </div>
</div>
<?php $this->endBlock() ?>