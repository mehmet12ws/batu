<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debugger Engelleme - PHP</title>
    <script>
        // Tarayıcı geliştirici araçlarını algılayan fonksiyon
        var isConsoleOpen = false;

        function runPageBugger() {
            console.clear();
            debugger;
            setTimeout(function() {
                runPageBugger();
            }, 500);
        }

        function killPageConsoleOpen() {
            document.write('Hizmetimizi kullanmak için geliştirici araçlarını kapatın.');
        }

        (function devtoolsDetector() {
            let devtoolsOpen = false;

            function detectDevTools() {
                const threshold = 160; // Konsolun genişlik/yükseklik eşiği
                const widthThreshold = window.outerWidth - window.innerWidth > threshold;
                const heightThreshold = window.outerHeight - window.innerHeight > threshold;

                if (widthThreshold || heightThreshold) {
                    if (!devtoolsOpen) {
                        killPageConsoleOpen();
                        runPageBugger();
                        devtoolsOpen = true;
                    }
                } else {
                    if (devtoolsOpen) {
                        location.reload(true); // Sayfayı yenile
                        devtoolsOpen = false;
                    }
                }
            }

            window.addEventListener('resize', detectDevTools);
            detectDevTools(); // Sayfa yüklendiğinde kontrol et
        })();
    </script>
</head>
<body>
    <h1>PHP ile Debugger Engelleme</h1>
    <p>Bu sayfa geliştirici araçları açıldığında tepki verecektir.</p>
</body>
</html>
