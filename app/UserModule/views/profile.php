<?php $this->extends('layout') ?>

<?php $this->block('content') ?>
    <div class="w-full flex items-center bg-gray-100">
        <div class="max-w-screen w-4/5 sm:mx-auto bg-white shadow-xl text-gray-900">
            <div class="h-32 overflow-hidden">
                <img class="object-center object-center w-screen"
                     src='https://static.vecteezy.com/system/resources/previews/002/099/443/non_2x/programming-code-coding-or-hacker-background-programming-code-icon-made-with-binary-code-digital-binary-data-and-streaming-digital-code-vector.jpg'
                     alt='Mountain'>
            </div>
            <div class="mx-auto w-44 h-44 relative -mt-24 border-4 border-white rounded-full overflow-hidden">
                <img class="object-cover w-screen h-44"
                     src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1000&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                     alt='Woman looking front'>
            </div>
            <div class="text-center mt-2">
                <h2 class="font-semibold"><?= $user->name() ?></h2>
                <p class="text-gray-500">Freelance Web Developer</p>
                <small>Contact: <span class="font-semibold"><?= $user->email() ?></span></small>
            </div>

            <form method="post" class="p-4 border-t mx-8 mt-2">
                <?= method('put') ?>
                <div class="w-full border-gray-400 flex-column">
                    <div class="w-full">
                        <h2 class="text-xl text-gray-600 pb-4">Account settings: <span class="text-green-500 text-sm"><?= $request->flash('success') ?></span></h2>
                    </div>

                    <div class="grid grid-cols-2">
                        <div class='w-full md:w-full px-3 mb-3'>
                            <label class='text-gray-600'>Email</label>
                            <input name="email"
                                   class='w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow'
                                   type='text'
                                   value="<?= $request->old('email', $user->email()) ?>"
                            >
                            <?php if($request->hasFLash('email')): ?>
                                <small class="text-red-500"><?= $request->flash('email') ?></small>
                            <?php endif ?>
                        </div>

                        <div class='w-full md:w-full px-3 mb-3'>
                            <label class='text-gray-600'>Old password</label>
                            <input name="old_password"
                                   class='w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow'
                                   type='password'
                            >
                            <?php if($request->hasFLash('old_password')): ?>
                                <small class="text-red-500"><?= $request->flash('old_password') ?></small>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="grid grid-cols-2">
                        <div class='w-full md:w-full px-3 mb-3'>
                            <label class='text-gray-600'>New password</label>
                            <input name="new_password"
                                   class='w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow'
                                   type='password'
                            >
                            <?php if($request->hasFLash('new_password')): ?>
                                <small class="text-red-500"><?= $request->flash('new_password') ?></small>
                            <?php endif ?>
                        </div>

                        <div class='w-full md:w-full px-3 mb-3'>
                            <label class='text-gray-600'>Confirm password</label>
                            <input name="confirm_password"
                                   class='w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow'
                                   type='password'
                            >
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button class="py-1.5 px-3 m-1 text-center bg-indigo-700 border rounded-md text-white hover:bg-indigo-500 hover:text-gray-100"
                                type="submit">Save changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $this->endblock() ?>