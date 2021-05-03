$("#user-chart-container").insertFusionCharts({
type: 'column2d',
width: '100%',
height: '100',
id: 'chart1',
dataFormat: 'json',
dataSource: {
"chart": {
  "paletteColors": "#0075c2",
  "showvalues": "0",
  "divlinealpha": "30",
  "numdivlines": "3",
  "showlabels": "0",
  "showYAxisValues": "0",
  "yAxisMaxValue": "9000",
  "palettecolors": "008ae6",
  "plotspacepercent": "0",
  "chartLeftMargin": "0",
  "chartRightMargin": "0",
  "plotToolText": "
$label,Users: $datavalue,
  "theme": "zune"
},
"data": user_chart_data //Variable in data.js that contains the json
}
});