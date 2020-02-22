        /* загрузка выбранного пользователя */
        function user_change(uid, login, famil, name, otch, did, doljn, aud_num, tel_num, rid) {
            var self = $('.uid-' + uid);
            var table = self.closest('table');
            var activeRow = table.data('active-row');
            if (activeRow) {
                activeRow.removeClass('active');
            }
            activeRow = self.closest('tr');
            table.data('active-row', activeRow);
            activeRow.addClass('active');

            $('#login').val(login);
            $('#uid').val(uid);
            $('#famil').val(famil);
            $('#name').val(name);
            $('#otch').val(otch);
            $('#departaments').val(did);
            $('#doljn').val(doljn);
            $('#aud_num').val(aud_num);
            $('#tel_num').val(tel_num);
            $('#roles').val(rid);
            $('#password').val('');
            $('#password_two').val('');

        }
        /************************************/

        /* новый пользователь */
        function newUser() {
            var self = $('.user-row');
            var table = self.closest('table');
            var activeRow = table.data('active-row');
            if (activeRow) {
                activeRow.removeClass('active');
            }
            $('#uid').val(-1);
            $('#login').val("");
            $('#famil').val("");
            $('#name').val("");
            $('#otch').val("");
            $('#departaments').val("");
            $('#doljn').val("");
            $('#aud_num').val("");
            $('#tel_num').val("");
            $('#roles').val("");
            $('#password').val('');
            $('#password_two').val('');
        }
        /**********************/

        /* сохранить пользователя */
        function saveUser() {
            $.ajax({
                url: '/workers/save',
                type: 'POST',
                data: $('#userform').serialize(),
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data == -1) alert('Произошла ошибка при сохранении! Обратитесь к администратору.');
                    else loadUserTable();
                },
                error: function (msg) {
                    alert('Ошибка');
                }
            });
        }
        /* сохранить пользователя */

        /* удалить пользователя */
        function deleteUser() {
            $.ajax({
                url: '/workers/delete',
                type: 'post',
                data: $('#userform').serialize(),
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    loadUserTable();
                },
                error: function (msg) {
                    alert('Ошибка');
                }
            });
        }
        /************************/

        function loadUserTable()
        {
            $.ajax({
                url: '/workers/workersList',
                type: 'GET',
                success:function(html){
                    $('#userTable').html(html);
                    newUser();
                }
            });
            setTimeout(arguments.callee, 60000);
        }
        loadUserTable();
        setTimeout(loadUserTable, 60000);