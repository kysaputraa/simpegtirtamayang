function initChartPie(id, datasets, title, colors) {
  const labels = [];
  const datas = [];

  datasets.forEach((item) => {
    const label = item[Object.keys(item)[0]]; // Get the first key (field name)
    const data = item[Object.keys(item)[1]]; // Get the first key (field name)
    labels.push(label);
    datas.push(parseInt(data)); // Convert string to integer
  });

  new Chart(id, {
    plugins: [ChartDataLabels],
    type: "pie",
    data: {
      labels: labels,
      datasets: [
        {
          backgroundColor: colors,
          data: datas,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: "top",
          display: false,
        },
        title: {
          display: true,
          text: title,
        },
        datalabels: {
          display: "auto",
          color: "black",
          font: {
            size: 9,
            weight: "bold",
          },
          formatter: (value, ctx) => {
            const total = ctx.chart.getDatasetMeta(0).total;
            let percentage = ((value * 100) / total).toFixed(2) + "%";
            // return percentage + "(" + value + ")";
            return percentage;
          },
        },
      },
      tooltips: {
        enabled: true,
        mode: "single",
        callbacks: {
          label: function (tooltipItem, data) {
            var allData = data.datasets[tooltipItem.datasetIndex].data;
            var tooltipLabel = data.labels[tooltipItem.index];
            var tooltipData = allData[tooltipItem.index];
            return tooltipLabel + ": " + tooltipData + "%";
          },
        },
      },
    },
  });
}

function initChart(type, id, datasets, title) {
  new Chart(id, {
    plugins: [ChartDataLabels],
    type: type,
    data: {
      labels: ["DATA"],
      datasets: datasets,
    },
    options: {
      maintainAspectRatio: false,
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: title,
        },
        datalabels: {
          anchor: "end", //[end start center] posisi
          align: "top",
          formatter: (val) => `${val}`,
          labels: {
            value: {
              color: "red",
            },
          },
        },
        legend: {
          display: true,
          position: "bottom",
        },
      },
    },
  });
}
