
# Сервис конвертации валют

### Пример получения курса валют

        $dates = DateRange::fromMondayToNow('2023-09-07');

        $service = new MoneyConvService();
        $data = $service->getRateOnDates($dates);

        // В $data будет что-то подобное:
        // [
        //     '2023-09-04' => [
        //         'USD' => 94.5435,
        //         'EUR' => 97.3456,
        //         ...
        //     ],
        //     ...
        // ]

