document.addEventListener('DOMContentLoaded', () => {
  const splineViewer = document.querySelector('#about > spline-viewer');
  if (!splineViewer) {
    console.warn('spline-viewer non trouvé');
    return;
  }

  const shadowRoot = splineViewer.shadowRoot;
  if (!shadowRoot) {
    console.warn('shadowRoot non disponible');
    return;
  }

  const logo = shadowRoot.querySelector('#logo');
  if (logo) {
    logo.remove();
    console.log('Logo supprimé du shadow DOM');
  } else {
    console.warn('#logo non trouvé dans le shadow DOM');
  }
});