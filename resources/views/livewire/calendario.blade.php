<div>
    @assets
    <script src="https://cdn.jsdelivr.net/npm/simple-jscalendar@1.4.5/source/jsCalendar.min.js" integrity="sha384-F3Wc9EgweCL3C58eDn9902kdEH6bTDL9iW2JgwQxJYUIeudwhm4Wu9JhTkKJUtIJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-jscalendar@1.4.5/source/jsCalendar.min.css" integrity="sha384-CTBW6RKuDwU/TWFl2qLavDqLuZtBzcGxBXY8WvQ0lShXglO/DsUvGkXza+6QTxs0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/simple-jscalendar@1.4.5/source/jsCalendar.lang.pt.js" integrity="sha384-OuvqMzktEfrB5yX69l56nmgYr7te4ddjTTDRWVFrVNhwfqIKxmtfZ/FuUfNSRyP6" crossorigin="anonymous"></script>
    @endassets


    <div id="wrapper" class="flex items-center">
        <div id="events-calendar"></div>
    </div>

    @script
        <script type="text/javascript">
            let el = document.getElementById("events-calendar");

            el.className = "classic-theme red";

            let calendar = jsCalendar.new( {
                target: el,
                monthFormat : "month YYYY",
                language : "pt"
            });

            calendar.onDateClick(function(event, date){
                // Update calendar date
                calendar.set(date);
                // Show events
                Livewire.dispatch('setData',{ data: date });
            });

        </script>
    @endscript

</div>
