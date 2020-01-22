function SwapDivsWithClick(div1, div2) {
    d1 = document.getElementById(div1);
    d2 = document.getElementById(div2);
    if (d2.style.display === "none") {
        d1.style.display = "none";
        d2.style.display = "flex";
    } else {
        d1.style.display = "flex";
        d2.style.display = "none";
    }
}
