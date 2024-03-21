<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP-お問い合わせアプリ</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <section class="text-gray-600 body-font relative" _msthidden="6">
        <div class="container px-5 py-24 mx-auto flex" _msthidden="6">
            <form class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md" _msthidden="6"  action="complete.php" method="post">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font" _msttexthash="107042" _msthidden="1" _msthash="155">お問い合わせフォーム</h2>
                <p class="leading-relaxed mb-5 text-gray-600" _msttexthash="2360410" _msthidden="1" _msthash="156">以下のフォームからお問い合わせください。</p>
                <div class="relative mb-4" _msthidden="1">
                    <label for="title" class="leading-7 text-sm text-gray-600" _msttexthash="58058" _msthidden="1" _msthash="157">タイトル（必須）</label>
                    <input type="text" id="title" name="title" placeholder="タイトル"  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4" _msthidden="1">
                    <label for="email" class="leading-7 text-sm text-gray-600" _msttexthash="58058" _msthidden="1" _msthash="157">Email（必須）</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4" _msthidden="1">
                    <label for="content" class="leading-7 text-sm text-gray-600" _msttexthash="92924" _msthidden="1" _msthash="158">お問い合わせ内容（必須）</label>
                    <textarea id="content" name="content" placeholder="お問い合わせ内容（1000文字までをお書きください）" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
                <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" _msttexthash="79859" _msthidden="1" _msthash="159" type="submit">送信</button>
            </form>
        </div>
    </section>

    <div>
        <a href="login.php">ログインへ</a>
    </div>

</body>
</html>