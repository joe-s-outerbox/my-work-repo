let needsTarget = document.querySelectorAll('class=[ssi-]');
for(let i = 0; i < needsTarget.length; i++) {
    needsTarget[i].firstElementChild.setAttribute('target', '_blank');
    needsTarget[i].firstElementChild.setAttribute('rel', 'nofollow noopener');
}
console.log(needsTarget);