<?php $this->extends('@ui:layout') ?>

<?php $this->block('form') ?>
    <form method="post">
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
                    placeholder="Confirm password"
            />
        </div>

        <div class="text-center lg:text-left">
            <button type="submit"
                    class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            >
                Save new password
            </button>
        </div>
    </form>
<?php $this->endblock() ?>