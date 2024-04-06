// Función para formatear números
function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + "").replace(",", "").replace(" ", "");
  const n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
    dec = typeof dec_point === "undefined" ? "." : dec_point;
  let s = "",
    toFixedFix = function (n, prec) {
      const k = Math.pow(10, prec);
      return "" + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || "").length < prec) {
    s[1] = s[1] || "";
    s[1] += new Array(prec - s[1].length + 1).join("0");
  }
  return s.join(dec);
}

// Configuración común para gráficos
const commonChartOptions = {
  maintainAspectRatio: false,
  layout: {
    padding: {
      left: 10,
      right: 25,
      top: 25,
      bottom: 0,
    },
  },
  legend: {
    display: false,
  },
  tooltips: {
    titleMarginBottom: 10,
    titleFontColor: "#6e707e",
    titleFontSize: 14,
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: "#dddfeb",
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    callbacks: {
      label: function (tooltipItem, chart) {
        const datasetLabel =
          chart.datasets[tooltipItem.datasetIndex].label || "";
        return datasetLabel + ": $" + number_format(tooltipItem.yLabel);
      },
    },
  },
};

// Configuración específica para el gráfico de barras
const barChartOptions = {
  scales: {
    xAxes: [
      {
        time: {
          unit: "month",
        },
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          maxTicksLimit: 6,
        },
        maxBarThickness: 25,
      },
    ],
    yAxes: [
      {
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5,
          padding: 10,
          callback: function (value, index, values) {
            return "$" + number_format(value);
          },
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2],
        },
      },
    ],
  },
};

// Aplicar configuración común a todas las instancias de Chart
Chart.defaults.global.defaultFontFamily =
  '"Nunito", -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

// Bar Chart Example
const ctx = document.getElementById("myBarChart");
const myBarChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [
      {
        label: "Revenue",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: [4215, 5312, 6251, 7841, 9821, 14984],
      },
    ],
  },
  options: { ...commonChartOptions, ...barChartOptions },
});
