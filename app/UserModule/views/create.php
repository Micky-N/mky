<?php $this->extends('layout') ?>

<?php $this->block('content') ?>
    <section class="mx-auto lg:px-20">
        <div class="h-full text-gray-800">
            <div
                    class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
            >
                <div
                        class="grow-0 shrink-1 md:shrink-0 basis-auto lg:w-6/12 w-9/12"
                >
                    <img
                            src="<?= asset('img/mky.png') ?>"
                            class="w-full"
                            alt="Sample image"
                    />
                </div>
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                    <form method="post" action="<?= router('users.store') ?>">
                        <!-- Email input -->
                        <div class="mb-6">
                            <input
                                    type="text"
                                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    name="email"
                                    placeholder="Email address"
                                    value="<?= $request->old('email', '') ?>"
                                    autofocus
                            />
                            <?php if($request->hasFlash('email')): ?>
                                <small class="text-red-500"><?= $request->flash('email') ?></small>
                            <?php endif ?>
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input
                                    type="password"
                                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    name="password"
                                    placeholder="Password"
                            />
                            <?php if($request->hasFlash('password')): ?>
                                <small class="text-red-500"><?= $request->flash('password') ?></small>
                            <?php endif ?>
                        </div>

                        <!-- Confirm Password input -->
                        <div class="mb-6">
                            <input
                                    type="password"
                                    class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    name="confirm_password"
                                    placeholder="Confirm your password"
                            />
                            <?php if($request->hasFlash('confirm_password')): ?>
                                <small class="text-red-500"><?= $request->flash('confirm_password') ?></small>
                            <?php endif ?>
                        </div>

                        <div class="text-center lg:text-left">
                            <button type="submit"
                                    class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                            >
                                Register
                            </button>
                            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                Already have an account ?
                                <a href="<?= router('ui.login') ?>"
                                   class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out"
                                >Login</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $this->endblock() ?>