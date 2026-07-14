import type { Project } from '../types';

const PROJECTS_MOCK: Project[] = [
  {
    id: 'proj_001',
    title: 'Residência Villa del Sol',
    slug: 'villa-del-sol',
    description: 'Mansão contemporânea com estrutura em concreto armado aparente e balanços arrojados.',
    longDescription: 'A Residência Villa del Sol representa o ápice da engenharia estrutural para residências de alto padrão. Com vãos livres superiores a 12 metros e estrutura híbrida em concreto protendido e metal, o projeto garante amplitude e integração perfeita com a natureza ao redor. Foram utilizadas soluções sustentáveis de captação solar e reúso hídrico.',
    category: 'Residencial',
    location: 'Barueri - SP',
    client: 'Cliente Privado',
    area: 680,
    year: 2024,
    image: '/images/villa_del_sol.png',
    status: 'Concluído'
  },
  {
    id: 'proj_002',
    title: 'Estrutura Multiuso Industrial',
    slug: 'estrutura-multiuso-industrial',
    description: 'Galpão industrial de alta resistência com concreto protendido e cobertura metálica espacial.',
    longDescription: 'Projeto estrutural focado em eficiência logística e alta capacidade de carga. Implementamos fundações profundas em estacas escavadas e piso industrial de concreto protendido de alta performance com planicidade controlada a laser, suportando tráfego dinâmico pesado.',
    category: 'Industrial',
    location: 'Cajamar - SP',
    client: 'LogisBR Empreendimentos',
    area: 15400,
    year: 2025,
    image: '/images/concrete_structure.png',
    status: 'Concluído'
  },
  {
    id: 'proj_003',
    title: 'Design Interno Edifício Horizon',
    slug: 'design-interno-horizon',
    description: 'Projeto de interiores corporativo e residencial premium com acabamento em madeira e vidro.',
    longDescription: 'Desenvolvimento e execução de escada autoportante em madeira nobre com guarda-corpos em vidro temperado laminado duplo. O projeto combina cálculos complexos de fixação invisível no concreto e acabamento de alto padrão acústico e tátil.',
    category: 'Residencial',
    location: 'Faria Lima, São Paulo - SP',
    client: 'Horizon Holdings',
    area: 420,
    year: 2023,
    image: '/images/interior_staircase.png',
    status: 'Concluído'
  },
  {
    id: 'proj_004',
    title: 'Edifício Corporativo Duarte JR',
    slug: 'corporativo-duarte-jr',
    description: 'Torre de escritórios moderna com pele de vidro acústica de alto desempenho térmico.',
    longDescription: 'Construção corporativa sustentável certificada. Fachada ventilada inteligente com pele de vidro que minimiza a incidência de raios UV, proporcionando redução de 25% no consumo elétrico de climatização. Projeto estrutural monolítico otimizado contra ventos fortes.',
    category: 'Comercial',
    location: 'Conde - BA',
    client: 'Duarte Participações',
    area: 8900,
    year: 2026,
    image: '/images/contemporary_building.png',
    status: 'Em Construção'
  }
];

export const productService = {
  async getAllProjects(): Promise<Project[]> {
    // Simular latência pequena
    await new Promise((resolve) => setTimeout(resolve, 100));
    return PROJECTS_MOCK;
  },

  async getProjectBySlug(slug: string): Promise<Project | undefined> {
    await new Promise((resolve) => setTimeout(resolve, 50));
    return PROJECTS_MOCK.find(p => p.slug === slug);
  },

  async getProjectById(id: string): Promise<Project | undefined> {
    await new Promise((resolve) => setTimeout(resolve, 50));
    return PROJECTS_MOCK.find(p => p.id === id);
  }
};
