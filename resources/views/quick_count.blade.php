@extends('layouts.layout')

@section('link')
	<li class="active">Quick Count</li>
@endsection

@section('content')
	<!-- Basic bar chart -->
	<script type="text/javascript">
        Chart.defaults.global.tooltips.custom = function(tooltip) {

        // Tooltip Element
      var tooltipEl = $('#chartjs-tooltip');

      if (!tooltipEl[0]) {
        $('body').append('<div id="chartjs-tooltip"></div>');
        tooltipEl = $('#chartjs-tooltip');
      }

      // Hide if no tooltip
      if (!tooltip.opacity) {
        tooltipEl.css({
          opacity: 0
        });
        $('.chartjs-wrap canvas')
          .each(function(index, el) {
            $(el).css('cursor', 'default');
          });
        return;
      }

      $(this._chart.canvas).css('cursor', 'pointer');

      // Set caret Position
      tooltipEl.removeClass('above below no-transform');
      if (tooltip.yAlign) {
        tooltipEl.addClass(tooltip.yAlign);
      } else {
        tooltipEl.addClass('no-transform');
      }

      // Set Text
      if (tooltip.body) {
        var innerHtml = [
          (tooltip.beforeTitle || []).join('\n'), (tooltip.title || []).join('\n'), (tooltip.afterTitle || []).join('\n'), (tooltip.beforeBody || []).join('\n'), (tooltip.body || []).join('\n'), (tooltip.afterBody || []).join('\n'), (tooltip.beforeFooter || [])
          .join('\n'), (tooltip.footer || []).join('\n'), (tooltip.afterFooter || []).join('\n')
        ];
        tooltipEl.html(innerHtml.join('\n'));
      }

      // Find Y Location on page
      var top = 0;
      if (tooltip.yAlign) {
        if (tooltip.yAlign == 'above') {
          top = tooltip.y - tooltip.caretHeight - tooltip.caretPadding;
        } else {
          top = tooltip.y + tooltip.caretHeight + tooltip.caretPadding;
        }
      }

      var position = $(this._chart.canvas)[0].getBoundingClientRect();

      // Display, position, and set styles for font
      tooltipEl.css({
        opacity: 1,
        width: tooltip.width ? (tooltip.width + 'px') : 'auto',
        left: position.left + tooltip.x + 'px',
        top: position.top + top + 'px',
        fontFamily: tooltip._fontFamily,
        fontSize: tooltip.fontSize,
        fontStyle: tooltip._fontStyle,
        padding: tooltip.yPadding + 'px ' + tooltip.xPadding + 'px',
      });
    };

    var config = {
        // Add legends
        legend: {
            data: [
                'Version 1.7 - 2k data','Version 1.7 - 2w data','Version 1.7 - 20w data','',
                'Version 2.0 - 2k data','Version 2.0 - 2w data','Version 2.0 - 20w data'
            ]
        },

        type: 'pie',
        data: {
            datasets: [{
                data: [300, 50, 100, 40,],
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                ],
            }],

            labels: [
                "Red",
                "Green",
                "Yellow",
                "Grey",
            ]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            tooltips: {
                enabled: false,
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

    </script>

    <div class="panel panel-flat">
		<div class="panel-body">          
            <div class="panel-heading">
                <h5 class="panel-title">Quick Count</h5>
            </div>
            <div id="canvas-holder" style="width: 300px;">
                <canvas id="chart-area" width="300" height="300" />
            </div>
		</div>
	</div>
	<!-- /basic bar chart -->
@endsection