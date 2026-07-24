# Homelab

Ansible-managed homelab on Proxmox (3 VMs).

| VM | RAM | Purpose |
|----|-----|---------|
| monitoring | 1 GB | Uptime Kuma + Portainer CE |
| websites | 2 GB | charanchander.be + cc-it-solutions.be (nginx + php-fpm, no WordPress) |
| adguard | 1 GB | AdGuard Home DNS |

## Usage

```bash
cd ansible
ansible-galaxy install -r requirements.yml
ansible-playbook -i inventory.yml site.yml --ask-vault-pass
```

## Secrets
Copy and fill in the `.env.*` files before running:
```bash
cp ansible/files/.env.websites.example ansible/files/.env.websites
# edit with real tokens/passwords
```
