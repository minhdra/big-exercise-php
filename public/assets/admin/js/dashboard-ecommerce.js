/*=========================================================================================
    File Name: dashboard-ecommerce.js
    Description: Ecommerce Dashboard
    ----------------------------------------------------------------------------------------
    Item Name: Convex - Bootstrap 4 HTML Admin Dashboard Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// chartist chart
// ------------------------------]
(function(window, document, $) {
    'use strict';
    $(window).on("load", function () {

        // Widget Area Chart 1 Starts
        var widgetlineChart = new Chartist.Line('#Widget-line-chart', {
            labels: [1,2,3,4,5,6],
            series: [
                [0,13,6,30,18,28]
            ]
        }, {
                low: 0,
                fullWidth: true,
                showArea: true,
                onlyInteger: true,
                targetLine: {
                    value: 30,
                    class: 'ct-target-line'
                },
                axisY: {
                    showGrid: false,
                    low: 0,
                    scaleMinSpace: 10,
                    showLabel: false,
                    offset: 0,
                },
                axisX: {
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 2
                }),
            });

        widgetlineChart.on('created', function (data) {
            var defs = data.svg.elem('defs');
            defs.elem('linearGradient', {
                id: 'wGradient',
                x1: 0,
                y1: 1,
                x2: 0,
                y2: 0
            }).elem('stop', {
                offset: 0,
                'stop-color': 'rgba(130,73,232, 1)'
            }).parent().elem('stop', {
                offset: 1,
                'stop-color': 'rgba(41,123,249, 1)'
            });
            const targetLineX = data.chartRect.x1 + (data.chartRect.width() - (data.chartRect.width() / data.bounds.step))

            data.svg.elem('line', {
                x1: targetLineX,
                x2: targetLineX,
                y1: data.chartRect.y1,
                y2: data.chartRect.y2
            }, data.options.targetLine.class);

        });
        widgetlineChart.on('draw', function (data) {
            var circleRadius = 10;
            if (data.type === 'point') {
                var circle = new Chartist.Svg('circle', {
                    cx: data.x,
                    cy: data.y,
                    r: circleRadius,
                    class: data.value.y === 30 ? 'ct-point-circle' : 'ct-point-circle-transperent'
                });
                data.element.replace(circle);
            }
        });
        // Widget Area Chart 1 Ends

        // Widget Area Chart 2 Starts
        var widgetlineChart = new Chartist.Line('#Widget-line-chart1', {
            labels: [1,2,3,4,5,6],
            series: [
                [0,13,6,30,18,28]
            ]
        }, {
                low: 0,
                fullWidth: true,
                showArea: true,
                onlyInteger: true,
                targetLine: {
                    value: 30,
                    class: 'ct-target-line'
                },
                axisY: {
                    showGrid: false,
                    low: 0,
                    scaleMinSpace: 10,
                    showLabel: false,
                    offset: 0,
                },
                axisX: {
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 2
                }),
            });

        widgetlineChart.on('created', function (data) {
            var defs = data.svg.elem('defs');
            defs.elem('linearGradient', {
                id: 'wGradient1',
                x1: 0,
                y1: 0,
                x2: 0,
                y2: 1
            }).elem('stop', {
                offset: 0,
                'stop-color': 'rgba(252,157,48, 1)'
            }).parent().elem('stop', {
                offset: 1,
                'stop-color': 'rgba(250,91,76, 1)'
            });
            var targetLineX = data.chartRect.x1 + (data.chartRect.width() - (data.chartRect.width() / data.bounds.step));

            data.svg.elem('line', {
                x1: targetLineX,
                x2: targetLineX,
                y1: data.chartRect.y1,
                y2: data.chartRect.y2
            }, data.options.targetLine.class);

        });
        widgetlineChart.on('draw', function (data) {
            var circleRadius = 10;
            if (data.type === 'point') {
                var circle = new Chartist.Svg('circle', {
                    cx: data.x,
                    cy: data.y,
                    r: circleRadius,
                    class: data.value.y === 30 ? 'ct-point-circle' : 'ct-point-circle-transperent'
                });
                data.element.replace(circle);
            }
        });
        // Widget Area Chart 2 Ends

        // Widget Area Chart 3 Starts
        var widgetlineChart = new Chartist.Line('#Widget-line-chart2', {
            labels: [1,2,3,4,5,6],
            series: [
                [0,13,6,30,18,28]
            ]
        }, {
                low: 0,
                fullWidth: true,
                showArea: true,
                onlyInteger: true,
                targetLine: {
                    value: 30,
                    class: 'ct-target-line'
                },
                axisY: {
                    showGrid: false,
                    low: 0,
                    scaleMinSpace: 10,
                    showLabel: false,
                    offset: 0,
                },
                axisX: {
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 2
                }),
            });

        widgetlineChart.on('created', function (data) {
            var defs = data.svg.elem('defs');
            defs.elem('linearGradient', {
                id: 'wGradient2',
                x1: 0,
                y1: 0,
                x2: 0,
                y2: 1
            }).elem('stop', {
                offset: 0,
                'stop-color': 'rgba(120, 204, 55, 1)'
            }).parent().elem('stop', {
                offset: 1,
                'stop-color': 'rgba(0, 75, 145, 1)'
            });
            const targetLineX = data.chartRect.x1 + (data.chartRect.width() - (data.chartRect.width() / data.bounds.step))

            data.svg.elem('line', {
                x1: targetLineX,
                x2: targetLineX,
                y1: data.chartRect.y1,
                y2: data.chartRect.y2
            }, data.options.targetLine.class);

        });
        widgetlineChart.on('draw', function (data) {
            var circleRadius = 10;
            if (data.type === 'point') {
                var circle = new Chartist.Svg('circle', {
                    cx: data.x,
                    cy: data.y,
                    r: circleRadius,
                    class: data.value.y === 30 ? 'ct-point-circle' : 'ct-point-circle-transperent'
                });
                data.element.replace(circle);
            }
        });
        // Widget Area Chart 3 Ends

    });
})(window, document, jQuery);