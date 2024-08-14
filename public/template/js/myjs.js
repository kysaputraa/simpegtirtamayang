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
