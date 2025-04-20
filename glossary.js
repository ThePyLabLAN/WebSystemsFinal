/* -------- instant glossary pop‑ups -------- */

/* 1. Glossary entries -------------------------------------------- */
const glossary = {
    HTML: 'HyperText Markup Language—the structure of every web page.',
    CSS: 'Cascading Style Sheets—controls presentation, layout, and visuals.',
    JavaScript: 'Adds interactivity and dynamic behavior to web pages.',
    DOM: 'Document Object Model—the in‑memory tree built from HTML.',
    API: 'Application Programming Interface—a contract for software to communicate.',
    REST: 'Representational State Transfer—resource‑oriented API style over HTTP.',
    GraphQL: 'Query language/runtime for flexible, client‑driven data fetching.',
    CMS: 'Content Management System—software (e.g., WordPress) that manages content.',
    'Headless CMS': 'CMS that serves content via APIs only, leaving rendering to your app.',
    'Virtual DOM': 'Lightweight copy of the real DOM diffed for fast UI updates.',
    'Node.js': 'JavaScript runtime on the server side (Chrome V8 engine).',
    React: 'Component‑based JavaScript library for building user interfaces.',
    Angular: 'Full‑featured framework using TypeScript for large‑scale apps.',
    'Web Components': 'Standard for reusable, encapsulated custom elements.',
    ARIA: 'Accessible Rich Internet Applications—attributes for assistive tech.',
    Accessibility: 'Designing content usable by everyone, including those with disabilities.',
  };
  
  /* 2. Create a single reusable tooltip element --------------------- */
  const tip = Object.assign(document.createElement('div'), {
    id: 'glossary-tooltip',
    style: `
      position:absolute; z-index:1000; display:none;
      max-width:260px; padding:8px 12px; border-radius:4px;
      background:#333; color:#fff; font-size:.9rem; line-height:1.3;
    `
  });
  document.body.appendChild(tip);
  
  /* 3. Wire up hover handlers for every glossary term --------------- */
  function attachGlossaryHandlers() {
    document.querySelectorAll('.glossary-term').forEach(el => {
      const key = el.dataset.term || el.textContent.trim();
  
      el.style.cursor = 'default'; // show pointer cursor on hover
  
      el.addEventListener('mouseenter', () => {
        const def = glossary[key];
        if (!def) return;                      // no definition? skip
        tip.textContent = def;
        tip.style.display = 'block';
        const rect = el.getBoundingClientRect();
        tip.style.left = `${window.scrollX + rect.left}px`;
        tip.style.top = `${window.scrollY + rect.bottom + 6}px`;
      });
  
      el.addEventListener('mouseleave', () => {
        tip.style.display = 'none';
      });
    });
  }
  
  /* 4. Run once DOM is ready --------------------------------------- */
  document.addEventListener('DOMContentLoaded', attachGlossaryHandlers);
  
