# nfactorial_altair_murat

- **Краткое описание проекта.**
  Gratitude lenta (diary) - это социальная сеть, где пользователи смогут писать свои истории о том, что произошло с ними за сегодня и за что именно они благодарны в этот день. Дневник благодарности хорошо помогает развивать чувство признательности за все, что есть в жизни, пусть это что-то на первый взгляд и не особо значимое. Быть признательным – значит, проявлять способность замечать и ценить хорошее в себе, в других людях и в окружающем мире. Пользователи не только имеют возможность хранить дневник благодарности у себя в гаджете, но еще и могут видеть за что благодарны другие люди, что за добро произошло у них за сегодня, нажав на их профиль, либо листая ленту. Также в этой социальной сети есть дополнительные функции: 1) streak счетчик - для того, чтобы пользователи были вовлечены в посещении вебсайта для того, чтобы не сбить свой стрик (добавил 1 благодарность за день = +1 к streak count в день) И 2) "i feel bad.." кнопка, нажав на которую можно увидеть мотивирующую цитату дня (цитата берется с помощью API с rapidapi) и случайную благодарность случайного пользователя из ленты постов, что позволяет пользователю поднять себе настроение.
  
- **Инструкции по установке и запуску.**
  Проект был выгружен на бесплатном хостинге Beget, поэтому можно сразу получить возможность ознакомиться приложением через сайт: http://c778043d.beget.tech/index.php

- **Описание процесса проектирования и разработки.**
  Сначала был разработан дизайн приложения в paint (сравнивал с веб платформой инстаграм). Исходя из дизайна, главная страница была разработана под современные стандарты социальных сетей. Программирование осуществовалось сразу в бесплатном хостинге Beget, где получилось поработать с бэкендом и фронтендом одновременно, чтобы легче было просматривать результат кода. После разработки login/registration форм и привязки их к базе данных SQL, получилось сделать саму ленту социальной сети. Дальше занимался добавлением кнопок и остальных функции. Получилось внедрить в код API ключ с мотивирующими цитатами, который обновляется каждый день. Система лайков работает засчет javascript кода.
  
- **Информацию об уникальных подходах или методологиях, использованных в работе.**
  1) streak счетчик - для того, чтобы пользователи были вовлечены в посещении вебсайта для того, чтобы не сбить свой стрик (добавил 1 благодарность за день = +1 к streak count в день)
  2) "i feel bad.." кнопка, нажав на которую можно увидеть мотивирующую цитату дня (цитата берется с помощью API с rapidapi) и случайную благодарность случайного пользователя из ленты постов, что позволяет пользователю поднять себе настроение.
  3) Можно поставить лайк на пост, а если нажать повторно, лайк убирается.
  4) Пользователи могут зарегистрироваться под свой никнейм и оставлять свои собственные посты.
  5) Можно нажать на свой профиль и на профиль остальных для того, чтобы увидеть все их когда-либо написанные посты.
  
- **Обсуждение компромиссов, принятых во время разработки.**
  Было принято решение сделать веб-приложение под стандарты ноутбуков/компьютеров, так как было удобнее наблюдать за необходимыми изменениями сразу через устройство (мой ноутбук) на котором был программирован.
  
- **Описание известных ошибок или проблем в приложении.**
  Время публикования поста показывается в Московском времени так как хостинг является Российским.
  
- **Объясните почему выбрали этот технический стэк.**
  Выбрал работу на javascript, html, php, css, SQL. Имеются обширные знания в этом техническом стэке, поэтому было удобно понимать и проектировать разработку проекта. К тому же, они являются одними из популярных, у которых нет сложности в интеграции с популярными браузерами, такими как Safari, Google Chrome и тд.
